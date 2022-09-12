<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RenewalFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('appointment');
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
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'issueby' => 'required|max:255',
            'issuedate' => 'required|max:255',
            'expire' => 'required|max:255',
            'birth' => 'required|max:255',

        ]);

        if($request->hasFile('licence') && $request->hasFile('photo') && $request->hasFile('medical')){

            // $request->validate([
            //     'photo'=> 'mime:jpeg,bmp,png',
            //     'licence'=> 'mimes:pdf',
            //     'medical'=> 'mimes:pdf',
            // ]);
            

            $request->licence->store('appointment/licence','public');
            $request->medical->store('appointment/medical','public');
            $request->photo->store('appointment/images','public');
            auth()->user()->appointment()->create([
                'fname'=>$request->get('fname'),
                'lname'=>$request->get('lname'),
                'email'=>$request->get('email'),
                'phone'=>$request->get('phone'),
                'address'=>$request->get('address'),
                "licence"=> $request->licence->hashName(),
                "photo"=> $request->photo->hashName(),
                "medical"=> $request->medical->hashName(),
                'status'=>0,
            ]);
            $details = [
            'title' => 'Application Sent',
            'body' => 'Hello! '.$request->get('fname').'. Thank you for sending an appointment request. You will notified as soon as we approved the application validity. A message from ET-Drivers Staff.',
        ];
        \Mail::to($request->get('email'))->send(new \App\Mail\ETDMail($details));
            Alert::success('Than You!', 'You have successfully submited the form.');
        }
        return view('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //return redirect(asset('storage/appointment/medical/tDv7QLCr90yTM3FfaJc3zVL0bFi9dFIedhIhP2Hj.pdf'));
       $pdf = RenewalForm::findOrFail($id);
       $name = $pdf->medical;
       return redirect(asset('storage/appointment/medical/'.$name));
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
