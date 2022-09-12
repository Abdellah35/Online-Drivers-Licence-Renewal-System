@extends('layouts.app')
@section('content')
    <div class="container align-items-center col-md-6" style="">
        <div class="imagebg"></div>
        <div class="row align-items-center bg-info" style="margin-top: 50px">
            <div class="col-md-12 col-md-offset-3 form-container">
                <h2 class=" text-center">Feedback</h2> 
                <p class=" text-center"> Please provide your feedback below: </p>
                <form action="{{ url('/feedback')}}" method="post" id="reused_form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>How do you rate your overall experience?</label>
                            <p>
                                <label class="radio-inline ml-2">
                                    <input type="radio" name="experience" id="radio_experience" value="bad" >
                                    Bad 
                                </label>
                                <label class="radio-inline ml-2">
                                    <input type="radio" name="experience" id="radio_experience" value="average" >
                                    Average 
                                </label>
                                <label class="radio-inline ml-2">
                                    <input type="radio" name="experience" id="radio_experience" value="good" >
                                    Good 
                                </label>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="comments"> Comments:</label>
                            <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="name"> Your Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="email"> Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn btn-lg btn-warning btn-block" >Send</button>
                        </div>
                    </div>
                </form>
                <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
                <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
            </div>
        </div>
    </div>
@endsection