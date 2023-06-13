@extends('layout')
@section('content')
    {{-- <div class="container">
        <div class="card login-form" style="
    width: 30%;
    margin-top: 11%;
    margin-left: 35%;
">
            <h3 class="card-title text-center">User Login</h3>
            <div class="card-text"> --}}
    <!--
                                                                                                                                                                                               <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
    {{-- <form action="{{ route('user.authenticate') }}" method="POST">
                    @csrf
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="submit" class="close" data-dismiss="alert">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif --}}
    <!-- to error: add class "has-danger" -->

    {{-- <div class="form-group row">
                        <div class="col-md-6 offset-md-3">
                            <a href="{{ route('login.google') }}">
                                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                                    style="margin-left: 0em;"></a> --}}
    {{-- <a href="{{ route('login.facebook') }}">
                                    <img src="https://developers.facebook.com/identity/images/btn_facebook_signin_dark_normal_web.png"
                                        style="margin-left: 0em;"></a> --}}
    {{-- </div>
                    </div>
                    <p style="text-align: center">OR</p>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control form-control-sm" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <a href="#" style="float:right;font-size:12px;">Forgot password?</a>
                        <input type="password" class="form-control form-control-sm" id="exampleInputPassword1"
                            name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>

                    <div class="sign-up">
                        Don't have an account? <a href="{{ route('user.signup') }}">Create One</a>
                    </div>
                </form>
            </div>
        </div> --}}
    <div class="container" id="login_card" style="margin-top: 140px;">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.authenticate') }}" method="POST">
                            @csrf
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    <button type="submit" class="close" data-dismiss="alert">x</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif


                            {{-- <div class="social-signin"><a class="btn btn-social g-signin"><span class="svg-icons"><svg
                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 18 18"
                                            xml:space="preserve">
                                            <path fill="#EA4334"
                                                d="M9,3.5c1.7,0,2.8,0.7,3.5,1.3L15,2.3C11.3-1,5.6-0.7,2.3,3C1.8,3.6,1.3,4.2,1,5l2.9,2.3C4.6,5,6.7,3.5,9,3.5z">
                                            </path>
                                            <path fill="#4185F3"
                                                d="M17.6,9.2c0-0.7-0.1-1.3-0.2-1.8H9v3.3h5c-0.2,1.2-0.9,2.2-1.8,2.9l2.8,2.2C16.7,14.1,17.7,11.7,17.6,9.2z">
                                            </path>
                                            <path fill="#FBBC05"
                                                d="M3.9,10.8c-0.4-1.2-0.4-2.4,0-3.6L1,5c-1.3,2.5-1.3,5.5,0,8.1L3.9,10.8z">
                                            </path>
                                            <path fill="#34A853"
                                                d="M9,18c2.4,0,4.5-0.8,6-2.2l-2.8-2.2c-0.8,0.5-1.8,0.9-3.1,0.9c-2.3,0-4.4-1.5-5.1-3.7L1,13C2.5,16.1,5.6,18,9,18z">
                                            </path>
                                        </svg></span>Sign in with Google</a><a class="btn btn-social f-signin"><span
                                        class="svg-icons"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" viewBox="0 0 20 20">
                                            <path fill="#fff"
                                                d="M10,0C4.5,0,0,4.5,0,10c0,5,3.6,9.1,8.3,9.9v-7.8H5.9V9.3h2.4V7.3c0-2.4,1.5-3.7,3.6-3.7 c1,0,1.9,0.1,2.2,0.1v2.5l-1.5,0c-1.2,0-1.4,0.6-1.4,1.4v1.8H14l-0.4,2.8h-2.4V20c4.9-0.6,8.8-4.8,8.8-10C20,4.5,15.5,0,10,0z">
                                            </path>
                                        </svg></span>Sign in with Facebook</a></div> --}}


                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <a href="{{ route('login.google') }}">
                                        <img
                                            src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"></a>
                                    {{-- <a href="{{ route('login.facebook') }}">
                                    <img src="https://developers.facebook.com/identity/images/btn_facebook_signin_dark_normal_web.png"
                                        style="margin-left: 0em;"></a> --}}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control form-control-sm" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="email">
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputPassword1">Password</label>
                                {{-- <a href="#" style="float:right;font-size:12px;">Forgot password?</a> --}}
                                <input type="password" class="form-control form-control-sm" id="exampleInputPassword1"
                                    name="password">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark main-bg">Login</button>
                            </div>
                            <div class="sign-up">
                                Don't have an account? <a href="{{ route('user.signup') }}">Create One</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
