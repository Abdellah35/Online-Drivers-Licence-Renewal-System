@extends('layouts.app')
@section('content')
<div class="container col-sm-8">
    <section class="mx-auto my-5" style="max-width: 23rem;">
        <div class="card card-form mt-2 col-sm-12">
          <div class="card-body rounded-top pink darken-4">
            <h3 class="font-weight-bold text-center text-uppercase text-white my-4">{{ __('Register')}}</h3>
            <form class="pb-5 px-2"  method="POST" action="{{ route('register') }}">
              @csrf
              <div class="d-flex justify-content-start align-items-center mb-4 ">
                <i class="far fa-user fa-lg text-white fa-fw me-3 pr-3"></i>
                <div class="form-outline form-white w-100">
                  <input type="text" id="form1Example1" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" autocomplete="FirstName"  placeholder="{{ __('First name') }}"/>
                  @error('fname')
                      <span class="invalid-feedback" role="alert">
                          <strong style="color: aliceblue;">{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="d-flex justify-content-start align-items-center mb-4">
                <i class="far fa-hand-point-right fa-lg text-white fa-fw me-3 pr-3"></i>
                <div class="form-outline form-white w-100">
                  <input type="text" id="form1Example2" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" autocomplete="LastName" placeholder="{{ __('Last name')}}"/>
                  @error('lname')
                      <span class="invalid-feedback" role="alert">
                          <strong style="color: aliceblue;">{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="d-flex justify-content-start align-items-center mb-4">
                <i class="far fa-address-book fa-lg text-white fa-fw me-3 pr-3"></i>
                <div class="form-outline form-white w-100">
                  <input type="number" id="form1Example3" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="email" placeholder="{{ __('Phone Number (eg: 0911******)') }}" />
                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong style="color: aliceblue;">{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="d-flex justify-content-start align-items-center mb-4">
                <i class="far fa-envelope fa-lg text-white fa-fw me-3 pr-3"></i>
                <div class="form-outline form-white w-100">
                  <input type="email" id="form1Example3" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('Your-Email') }}" />
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong style="color: aliceblue;">{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="d-flex justify-content-start align-items-center mb-4">
                <i class="fas fa-key fa-lg text-white fa-fw me-3 pr-3"></i>
                <div class="form-outline form-white w-100">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="d-flex justify-content-start align-items-center mb-4">
                <i class="fas fa-key fa-lg text-white fa-fw me-3"></i>
                <div class="form-outline form-white w-100">
                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                    </div>
                </div>
              </div>
              
              
          </div>
          <div class="card card-form-2 mb-0 z-depth-0">
            <div class="card-body">
              <div class="text-center">
                <button class="btn btn-outline-primary btn-rounded btn-block z-depth-0" type="submit">Register</button>
          </form>
                  <p>By clicking
                  <em>Register</em> you will 
                  <a class="pink-accent-text" href="#!" target="_blank">register on the system</a> and
                  <a class="pink-accent-text" href="#!" target="_blank">login to the home page.</a>. </p>
                  </div>
            </div>
          </div>
        </div>
        
      </section>
    </div>
  <style>
  .pink.darken-4 {
    background-color: #4ea4f594;
  }
  .md-calendar .form-check,
  .red-checkbox .form-check-input[type=checkbox]:checked {
    background-color: #fb002644;
  }
  .red-checkbox .form-check-input:checked {
    border-color: #fb002680;
  }
  .red-checkbox .form-check-input:checked:focus:before {
    box-shadow: 0 0 0 13px #fb0025;
  }
  .card-form .card-form-2 {
    -webkit-border-top-left-radius: 21px;
    border-top-left-radius: 21px;
    -webkit-border-top-right-radius: 21px;
    border-top-right-radius: 21px;
    margin-top: -35px;
  }
  .card-form .card-form-2 .pink-accent-text {
    color: #f80606;
  }
  </style>
</div>
@endsection
