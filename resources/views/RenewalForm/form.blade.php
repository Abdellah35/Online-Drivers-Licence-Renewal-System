@extends('layouts.app')
@section('content')
<div class="col-lg-8 my-6 mb-0 wow fadeInUp text-center " data-wow-delay="0.1s">
    <div class="bg-primary text-center p-5">
        <h1 class="mb-4">Make Appointment</h1>
        <form>
            <div class="row g-3">
                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control border-0" id="gname" placeholder="Gurdian Name">
                        <label for="gname">Your Name</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="email" class="form-control border-0" id="gmail" placeholder="Gurdian Email">
                        <label for="gmail">Your Email</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control border-0" id="cname" placeholder="Child Name">
                        <label for="cname">Courses Type</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control border-0" id="cage" placeholder="Child Age">
                        <label for="cage">Car Type</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                        <label for="message">Message</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-dark w-100 py-3" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection