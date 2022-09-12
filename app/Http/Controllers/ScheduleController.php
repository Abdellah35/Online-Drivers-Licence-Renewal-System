<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RenewalForm;
use App\Models\Schedule;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RenewalForm $schedule_request)
    {
        $schedule = Schedule::all();
        $applicant = RenewalForm::all();

        $schedules = $schedule_request->schedule;
        return view('dashboard.schedule-request',['applicant'=>$applicant,'schedule'=>$schedule,'schedule_request'=>$schedule_request], compact('schedules'));
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
        
        $applicants = RenewalForm::where('email', '=' , $request->get('drives_email'))->first();
        if ($applicants->status == '1') {
       
            $applicants->schedule()->create([
                "applicant"=>$applicants->id,
                "email"=> $request->get('drives_email'),
                "detail"=> $request->get('datail'),
                "schedule"=> $request->get('date'),

            ]);
            $applicants->status = '2';
            $applicants->update();
        }
        elseif ($applicants->status == '2') {
            $applicants->schedule()->update([
                "applicant"=>$applicants->id,
                "email"=> $request->get('drives_email'),
                "detail"=> $request->get('datail'),
                "schedule"=> $request->get('date'),

            ]);
        }

        $details = [
            'title' => 'Schedule for Appointment',
            'body' => 'Hello! '.$applicants->fname.'. Thank you for sending an appointment request. You have scheduled for '.$applicants->schedule->schedule.'. Please! act accordingly. A message from ET-Drivers Staff.',
        ];
        \Mail::to($applicants->email)->send(new \App\Mail\ETDMail($details));
        
        return redirect()->route('appointment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applications = RenewalForm::where('id', $id)->first();
        return view('dashboard.request_detail', compact('applications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RenewalForm $schedule_request)
    {
        $applicant = RenewalForm::all();
        $schedule = Schedule::all();
        $schedules = $schedule_request->schedule;
        return view('dashboard.schedule-request', compact('schedule_request','schedules', 'schedule','applicant'));
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
