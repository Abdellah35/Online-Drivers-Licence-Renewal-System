@extends('layouts.app')
@section('content')

<div class="container col-sm-12 py-5">
    <div class="card card-rounded shadow col-sm-10 align-items-center mx-auto" style="background-color: rgb(245, 245, 241);">
        <div class="card-body col-sm-12">
            <div class="col-sm-11 my-6 mb-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class=" align-items-center col-sm-12">
                    @if (!(auth()->user()->appointment))
                    <h1 class="mb-4 text-center">Make Appointment</h1>
                    <form action="{{ url('/appointment/store')}}" enctype="multipart/form-data" method="POST" >
                        @csrf
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                            <div class="form-outline">
                                <input type="text" id="firs" class="form-control" placeholder="First Name" name="fname" value={{ auth()->user()->fname}} >
                                <label class="form-label" for="firs">First name</label>
                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-outline">
                                <input type="text" id="last" class="form-control" placeholder="Last Name" name="lname" value={{ auth()->user()->lname}}>
                                <label class="form-label" for="last">Last name</label>
                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="emia" class="form-control" placeholder="Your Email" name="email" value={{ auth()->user()->email}} />
                            <label class="form-label" for="emai">Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Number input -->
                        <div class="form-outline mb-4">
                            <input type="number" id="phon" class="form-control" placeholder="Phone Number" name="phone" value={{ auth()->user()->phone}} />
                            <label class="form-label" for="phon">Phone</label>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Address input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="addres" class="form-control" placeholder="Your Address" name="address" />
                            <label class="form-label" for="addres">Address</label>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                            <div class="form-outline">
                                <input type="text" id="issueby" class="form-control" placeholder="" name="issueby"  >
                                <label class="form-label" for="issueby">Issued By:</label>
                                @error('issueby')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-outline">
                                <input type="date" id="issuedate" class="form-control" placeholder="" name="issuedate" >
                                <label class="form-label" for="issuedate">Issued Date:</label>
                                @error('issuedate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                            <div class="form-outline">
                                <input type="date" id="expire" class="form-control" placeholder="" name="expire"  >
                                <label class="form-label" for="expire">Expired Date:</label>
                                @error('expire')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-outline">
                                <input type="date" id="birth" class="form-control" placeholder="" name="birth" >
                                <label class="form-label" for="birth">Birth Date:</label>
                                @error('birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                        </div>
                        <!-- Licence input -->
                        <div class="d-flex mb-4 col-sm-12">
                            <label for="licence" class="col-sm-4">Your Drivers Licence(pdf) </label>
                            <div class="form-outline form-white w-100">
                                <input type="file" class="form-control border-0 col-sm-7" id="licence" name="licence" >
                                @error('licence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Photo input -->
                        <div class="d-flex mb-4 col-sm-12">
                            <label for="photo" class="col-sm-4">Your photo(passport size)</label>
                            <div class="form-outline form-white w-100">
                                <input type="file" class="form-control border-0 col-sm-7" id="photo" name="photo" >
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Medical input -->
                        <div class="d-flex mb-4 col-sm-12">
                            <label for="medical" class="col-sm-4">Medical Certificate(pdf)</label>
                            <div class="form-outline form-white w-100">
                                <input type="file" class="form-control border-0 col-sm-7" id="medical" name="medical" >
                                @error('medical')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: rgb(255, 5, 5);">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Submit button -->
                        <div class="row col-sm-12 justify-content-between mx-auto ml-5 pl-5">
                            <button type="submit" class="btn btn-primary btn-block mb-4 col-sm-6 ml-5">Submit Application</button>
                        </div>
                        </form>
                    @else
                        @if (auth()->user()->appointment->status == 0)
                            <h5>You have already send an appointment request.</h5>
                            <h6>Your appointment request is in progress.</h6>
                        @else
                            @if (auth()->user()->appointment->schedule)
                            <h5>You have scheduled for {{auth()->user()->appointment->schedule->schedule}}.</h5>
                            <h6>Please! act according to the schedule.</h6>
                            @else
                            <h5>Apllication not yet scheduled.</h5>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection