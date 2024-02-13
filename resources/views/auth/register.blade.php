@extends('layouts.front_config')
@section('content')
      <!-- login area start -->
      <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="login-form-head">
                        <h4>Sign up</h4>
                        <p>Hello there, Sign up and Join with Us</p>
                    </div>
                    <div class="login-form-body">

                        <div class="form-gp">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name"  value="{{ old('last_name') }}" clas="@error('first_name') is-invalid @enderror">
                            <i class="ti-user"></i>
                            @error('first_name')
                                 <div class="text-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="form-gp">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" clas="@error('last_name') is-invalid @enderror">
                            <i class="ti-user"></i>
                            @error('last_name')
                                 <div class="text-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="form-gp">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" id="password"  name="password"   autocomplete="new-password">
                            <i class="ti-lock"></i>
                            @error('password')
                                 <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                            <i class="ti-lock"></i>
                            @error('password_confirmation')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                            <div class="login-other row mt-4">
                                <div class="col-6">
                                    <a class="fb-login" href="#">Sign up with <i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="col-6">
                                    <a class="google-login" href="#">Sign up with <i class="fa fa-google"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="{{route('login')}}">Sign in</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

@endsection
