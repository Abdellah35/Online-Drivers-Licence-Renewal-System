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
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Approved Requests</h4>
          <div class="table-responsive  mt-1">
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Schedule</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($renewal_form as $applications)
                        @if($applications->status == 1 or $applications->status ==2)
                          <tr>
                            <td class="py-1">
                              <a href="{{ url(asset('storage/appointment/images/'.$applications->photo)) }}" target="_blank"><img src="{{ (asset('storage/appointment/images/'.$applications->photo)) }}" alt="image"/></a> 
                            </td>
                            <td><h6>{{$applications->fname}} - {{$applications->lname}}</h6></td>
                            <td><h6>{{$applications->email}}</h6></td>
                            <td><h6>{{$applications->user_id}}<h6></td>
                            <td><h6>{{$applications->phone}}</h6></td>
                            <td><h6>{{$applications->address}}</h6></td>
                            <td><a href="{{asset ('storage/appointment/licence/'.$applications->licence )}}" target="_blank">Download License</a></td>
                            <td><a href="{{asset ('storage/appointment/medical/'.$applications->medical )}}" target="_blank">Download Medical data</a></td>
                            <td> 
                              @if($applications->status == "1" )
                                <a class="btn btn-outline-success mr-3" href="{{route ('schedule_request.edit', $applications->id)}}">Schedule</a>
                              @elseif($applications->status == "2" )
                                <a class="btn btn-outline-success mr-3" href="{{route ('schedule_request.edit', $applications->id)}}">ReSchedule</a>
                              @endif
                            </td> 
                            <td>
                                <button type="button" class="btn btn-outline-danger delete" value="{{ $applications->id }}">Delete</button>
                                
                            </td>
                        @else
                        @endif
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