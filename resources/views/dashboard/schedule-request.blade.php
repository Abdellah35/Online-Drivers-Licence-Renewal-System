@extends('layouts.base')
@section('pagetitle')
Renewal Request
@endsection
@section('content')
<div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Schedule Renewal Date</h4>
      <h6 class="card-description">
        {{$schedule_request->fname}} {{$schedule_request->lname}}
      </h6>
      @if ($schedule_request->status == "2")
        <form method="POST" action="{{route ('schedule_request.store')}}" class="forms-sample">
          @csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Drives Name</label>
              <input type="text" value="{{$schedule_request->fname}} {{$schedule_request->lname}}" class="form-control" name="drives_name" id="exampleInputUsername1" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" value="{{$schedule_request->email}}" name="drives_email" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Detail</label>
              <textarea class="form-control"  name="datail" id="exampleInputEmail1" placeholder="Desscribe some things">{{$schedules->detail}}</textarea> 
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Schedule Date</label>
              <input type="datetime-local" class="form-control" required="true" name="date" id="exampleInputPassword1" placeholder="" value="{{$schedules->schedule}}">
            </div>
            <button type="submit" class="btn btn-primary me-2">Update</button>
        </form>
      @else
        <form method="POST" action="{{route ('schedule_request.store')}}" class="forms-sample">
          @csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Drives Name</label>
              <input type="text" value="{{$schedule_request->fname}} {{$schedule_request->lname}}" class="form-control" name="drives_name" id="exampleInputUsername1" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" value="{{$schedule_request->email}}" name="drives_email" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Detail</label>
              <textarea class="form-control"  name="datail" id="exampleInputEmail1" placeholder="Desscribe some things"></textarea> 
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Schedule Date</label>
              <input type="datetime-local" class="form-control" required="true" name="date" id="exampleInputPassword1" placeholder="" value="">
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
        </form>
      @endif
    </div>
  </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Schedule</h4>
      <p class="card-description">
        See Available Schedule here
      </p>
        <div class="table-responsive  mt-1">
         <div style="height:600px;overflow:auto;">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Profile</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Applicant</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Schedule</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($schedule as $schedules)
                      <tr>
                        <td class="py-1">
                           @foreach($applicant as $applicants)
                            @if($schedules->applicant == $applicants->id)
                              <a href="{{ url(asset('storage/appointment/images/'.$applicants->photo)) }}" target="_blank"><img src="{{ (asset('storage/appointment/images/'.$applicants->photo)) }}" alt="image"/></a> 
                            @endif
                          @endforeach
                          
                        </td>
                        <td>
                          @foreach($applicant as $applicants)
                            @if($schedules->applicant == $applicants->id)
                              <h6>
                                {{$applicants->fname}} {{$applicants->lname}}
                              </h6>
                            @endif
                          @endforeach
                        </td>
                        <td><h6>{{$schedules->email}}</h6></td>
                        <td><h6></h6>{{$schedules->schedule}}</td>
                        <td>
                            <button type="button" class="btn btn-outline-danger delete" value="">Delete</button>
                            
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>    

                
@endsection

@section('scripts')
    <script>
       document.addEventListener('DOMContentLoaded', function() {
         var elems = document.querySelectorAll('.datepicker');
         M.Datepicker.init(elems, options);
       });
       $(document).ready(function(){
          $('.datepicker').datepicker();
       });
    </script>
@endsection