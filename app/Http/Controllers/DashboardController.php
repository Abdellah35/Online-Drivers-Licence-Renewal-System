<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RenewalForm;
use App\Models\FeedBack;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending = RenewalForm::where('status',0)->count();
        $aprvreq = RenewalForm::where('status',1)->count();
        $closedapp = RenewalForm::where('status',2)->count();
        $applications = RenewalForm::all();
        $totalreq = RenewalForm::all()->count();
        $numcomments = FeedBack::all()->count();
        return view('dashboard.home',['application'=>$applications,'totalreq'=>$totalreq,'pending'=>$pending,'aprvreq'=>$aprvreq,'closedapp'=>$closedapp,'numcomments'=>$numcomments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
    public function destroy($id)
    {
        //
    }
}
