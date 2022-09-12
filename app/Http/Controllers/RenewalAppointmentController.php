<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RenewalForm;

class RenewalAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renewal_form = RenewalForm::all();
        return view('dashboard.renewal_request', compact('renewal_form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $applications = RenewalForm::where('id', $id)->first();
        return view('dashboard.request_detail', compact('applications'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $renewal_form = RenewalForm::find($id);   
        $renewal_form->status = '1';

        $renewal_form->update();
        return redirect()->route('appointment.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request = RenewalForm::find($request->question_delete_id);
        $request->delete();
        return redirect()->route('appointment.index');
    }

    public function approvedrequest()
    {
        $renewal_form = RenewalForm::all();
        return view('dashboard.approved-request', compact('renewal_form'));
    }

    public function newrequest()
    {
        $renewal_form = RenewalForm::all();
        return view('dashboard.new-request', compact('renewal_form'));
    }
}
