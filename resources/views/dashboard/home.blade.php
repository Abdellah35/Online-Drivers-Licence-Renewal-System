@extends('layouts.base')
@section('content')
<div class="col-sm-12">
      <div class="home-tab">
        <div class="tab-content tab-content-basic">
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
            <div class="row">
              <div class="col-lg-8 d-flex flex-column">
                <div class="row flex-grow">
                  <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                      <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                          <div>
                           <h4 class="card-title card-title-dash">Drivers License Application Dashboard</h4>
                          </div>
                          <div id="performance-line-legend"></div>
                        </div>
                        <div class="chartjs-wrapper mt-5">
                          <img class="w-100" src="{{ asset('assets/img/licence.jpg') }}" alt="Image">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 d-flex flex-column">
                <div class="row flex-grow">
                  <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card bg-primary card-rounded">
                      <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
                        <div class="row">
                          <div class="col-sm-4">
                            <p class="status-summary-ight-white mb-1">Closed Applications</p>
                            <h2 class="text-info">{{$closedapp}}</h2>
                          </div>
                          <div class="col-sm-8">
                            <div class="status-summary-chart-wrapper pb-4">
                              <canvas id="status-summary"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                              <div class="circle-progress-width">
                                <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                              </div>
                              <div>
                                <p class="text-small mb-2">Total Requests</p>
                                <h4 class="mb-0 fw-bold">{{$totalreq}}</h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="circle-progress-width">
                                <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                              </div>
                              <div>
                                <p class="text-small mb-2">Aproved Requests</p>
                                <h4 class="mb-0 fw-bold">{{$aprvreq}}</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 d-flex flex-column">
                <div class="row flex-grow">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                      <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                          <div>
                            <h4 class="card-title card-title-dash">Pending Requests</h4>
                           <p class="card-subtitle card-subtitle-dash">You have {{$pending}} new requests</p>
                          </div>
                          <div>
                          </div>
                        </div>
                        <div class="table-responsive  mt-1">
                        @if ($pending == 0)
                          <h3>There are no new requests</h3>
                        @else
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
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Approve</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach($application as $applications)
                                    @if($applications->status == "0")
                                      <tr>
                                        <td class="py-1">
                                          <a href="{{ asset('storage/appointment/images/'. $applications->photo) }}" target="_blank"><img src="{{ asset('storage/appointment/images/'. $applications->photo) }}" alt="image"/></a>
                                        </td>
                                        <td><a href="{{route('schedule_request.show', $applications->id)}}"><h6>{{$applications->fname}} - {{$applications->lname}}</h6></td>
                                        <td><h6>{{$applications->email}}</h6></td>
                                        <td><h6>{{$applications->user_id}}</h6></td>
                                        <td><h6>{{$applications->phone}}</h6></td>
                                        <td><h6>{{$applications->address}}</h6></td>
                                        <td><a href="{{asset ('storage/license/'.$applications->licence )}}">view License data</a></td>
                                        <td><a href="{{asset ('storage/medical/'.$applications->medical )}}">view Medical data</a></td>
                                        <td><a class="btn btn-outline-success" href="">Approve</a></td> 
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
                          @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection