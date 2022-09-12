@extends('layouts.base')
@section('pagetitle')
Renewal Request
@endsection
@section('content')
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Renewal Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <span area-hidden = "true" >&times;</span>
                </div>
              <form action="{{url ('delete_request')}}" method="POST" id="deleteForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="question_delete_id" id="question_id">
                    <p style="border-inline-start-color: aqua"> ARE YOU SURE YOU WANT TO DELETE!!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">YES! DELETE</button>
                </div>
              </form>
            </div>
        </div>
    </div>
<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">New Renewal Request Table</h4>
                  <div class="table-responsive">
                     <div style="height:300px;overflow:auto;">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Applicant</th>
                              <th>Email</th>
                              <th>User_Id</th>
                              <th>Phone No</th>
                              <th>Address</th>
                              <th>Photo</th>
                              <th>License</th>
                              <th>Medical-INFO</th>
                              <th>Status</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($renewal_form as $applications)
                              @if($applications->status == "0")
                                <tr>
                                  <td><a href="{{route('schedule_request.show', $applications->id)}}"><h6>{{$applications->fname}} - {{$applications->lname}}</h6></td>
                                  <td>{{$applications->email}}</td>
                                  <td>{{$applications->user_id}}</td>
                                  <td>{{$applications->phone}}</td>
                                  <td>{{$applications->address}}</td>
                                  <td><a href="{{ url(asset('storage/appointment/images/'.$applications->photo)) }}" target="_blank">show</a></td>
                                  <td><a href="{{ url(asset('storage/appointment/licence/'.$applications->licence)) }}" target="_blank">show</a></td>
                                  <td><a href="{{ url(asset('storage/appointment/medical/'.$applications->medical)) }}">show</a></td>
                                  <td>
                                      <a class="btn btn-outline-danger mr-3" href="{{ route('appointment.show',$applications->id) }}">Approve</a>
                                  </td>
                                  <td>
                                    <button type="button" class="btn btn-outline-danger delete" value="{{ $applications->id }}">Delete</button>
                                  </td>
                                </tr>
                              @else
                                
                              @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Approved Requests</h4>
                  <div class="table-responsive">
                     <div style="height:300px;overflow:auto;">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Applicant</th>
                              <th>Email</th>
                              <th>User_Id</th>
                              <th>Phone No</th>
                              <th>Address</th>
                              <th>Photo</th>
                              <th>License</th>
                              <th>Medical-INFO</th>
                              <th>Delete</th>
                              <th>Schedule</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($renewal_form as $applications)
                              @if($applications->status == 1 or $applications->status == 2)
                                <tr>
                                  <td><a href="{{route('schedule_request.show', $applications->id)}}"><h6>{{$applications->fname}} - {{$applications->lname}}</h6></td>
                                  <td>{{$applications->email}}</td>
                                  <td>{{$applications->user_id}}</td>
                                  <td>{{$applications->phone}}</td>
                                  <td>{{$applications->address}}</td>
                                  <td><a href="{{ url(asset('storage/appointment/images/'.$applications->photo)) }}" target="_blank">show</a></td>
                                  <td><a href="{{ url(asset('storage/appointment/licence/'.$applications->licence)) }}" target="_blank">show</a></td>
                                  <td><a href="{{ url(asset('storage/appointment/medical/'.$applications->medical)) }}" target="_blank">show</a></td>
                                  <td>
                                    <button type="button" class="btn btn-outline-danger delete" value="{{ $applications->id }}">Delete</button>  
                                  </td>
                                  <td>
                                     @if($applications->status == "1" )
                                      <a class="btn btn-outline-success mr-3" href="{{route ('schedule_request.edit', $applications->id)}}">Schedule</a>
                                    @elseif($applications->status == "2" )
                                      <a class="btn btn-outline-success mr-3" href="{{route ('schedule_request.edit', $applications->id)}}">ReSchedule</a>
                                    @endif
                                  </td>
                                </tr>
                              @else
                                
                              @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Renewal Requests</h4>
                  <div class="table-responsive">
                     <div style="height:600px;overflow:auto;">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Profile</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Applicant</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Email</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >User_Id</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Phone No</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Address</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >License</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Medical-INFO</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >State</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Send Schedule</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Action</th>
                            </tr>
                          </thead>
                          <tbody>
                             @foreach($renewal_form as $applications)
                                <tr>
                                  <td class="py-1">
                                    <a href="{{ url(asset('storage/appointment/images/'.$applications->photo)) }}" target="_blank"><img src="{{ (asset('storage/appointment/images/'.$applications->photo)) }}" alt="image"/></a>                
                                  </td>
                                  <td><a href="{{route('schedule_request.show', $applications->id)}}"><h6>{{$applications->fname}} - {{$applications->lname}}</h6></td>
                                  <td>{{$applications->email}}</td>
                                  <td>{{$applications->user_id}}</td>
                                  <td>{{$applications->phone}}</td>
                                  <td>{{$applications->address}}</td>
                                  <td><a href="{{ url(asset('storage/appointment/licence/'.$applications->licence)) }}" target="_blank">show</a></td>
                                  <td><a href="{{ url(asset('storage/appointment/medical/'.$applications->medical)) }}" target="_blank">show</a></td>
                                  @if($applications->status == "0")
                                    <td><a class="btn btn-outline-success" href="{{ route('appointment.show',$applications->id) }}">Approve</a></td>
                                  @else
                                    <td>IS Approved</td>
                                  @endif
                                  <td>
                                    @if($applications->status == "1" )
                                      <a class="btn btn-outline-success mr-3" href="{{route ('schedule_request.edit', $applications->id)}}">Schedule</a>
                                    @elseif($applications->status == "2" )
                                      <a class="btn btn-outline-success mr-3" href="{{route ('schedule_request.edit', $applications->id)}}">ReSchedule</a>
                                    @else
                                      <p>IS Not Approved</p>
                                    @endif
                                      
                                  </td>
                                  <td>
                                      <button type="button" class="btn btn-outline-danger delete" value="{{ $applications->id }}">Delete</button>
                                      
                                  </td>
                                </tr>
                            @endforeach
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
                
@endsection

@section('scripts')
  <script>
      $(document).ready(function () {
          $('.delete').click(function (e) { 
              e.preventDefault();

              var question_id = $(this).val();
              $('#question_id').val(question_id)
              $('#deleteModal').modal('show');
              
          });
      });
  </script>

@endsection