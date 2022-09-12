@extends('layouts.base')
@section('pagetitle')
Renewal Request
@endsection
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Requests Detail</h4>
          </div>
        </div>
      </div>
    </div>
     <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">

          <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">

                            <h3 class="dark-color">{{$applications->fname}}--{{$applications->lname}}</h3>
                            
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Email</label>
                                    </div>
                                    <div class="media">
                                        <label>Adress</label>
                                    </div>
                                    <div class="media">
                                        <label>Phone no</label>
                                    </div>
                                    <div class="media">
                                        <label>License</label>
                                        <p><a href="{{asset ('storage/appointment/license/'.$applications->licence )}}">view License data</a></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>{{$applications->email}}</label>
                                    </div>
                                    <div class="media">
                                        <label>{{$applications->address}}</label>
                                    </div>
                                    <div class="media">
                                        <label>{{$applications->phone}}</label>
                                    </div>
                                    <div class="media">
                                        <label>Medical</label>
                                        <p><a href="{{asset ('storage/appointment/medical/'.$applications->medical )}}">Medical data</a></p>
                                    </div>
                                </div>
                                <a class="btn btn-outline-success" href="{{ route('appointment.show',$applications->id) }}">Approve</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <a href="{{ url(asset('storage/appointment/images/'.$applications->photo)) }}" target="_blank"><img src="{{ (asset('storage/appointment/images/'.$applications->photo)) }}" alt="image"/ height="400" width="370"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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