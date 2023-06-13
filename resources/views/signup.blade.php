@extends('layout')
@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5" style="    margin-top: 13%;">
                <div class="card">
                    <h2 class="card-title text-center"><a href="http://opensnippets.com"> User Register </a></h2>
                    <div class="card-body py-md-4">
                        <form _lpchecked="1" action="{{ route('user.store') }}" method="POST">
                            @csrf
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    <button type="submit" class="close" data-dismiss="alert">x</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                @error('name')
                                    <p class="text-red-500 my-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Email"
                                    name="email">
                                @error('email')
                                    <p class="text-red-500 my-3">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    name="password">
                                @error('password')
                                    <p class="text-red-500 my-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <a href="/login">Login</a>
                                <button class="btn btn-primary" type="submit">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                        <form _lpchecked="1" action="{{ route('user.store') }}" method="POST">
                            @csrf
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    <button type="submit" class="close" data-dismiss="alert">x</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <div class="mb-4">
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                @error('name')
                                    <p class="text-red-500 my-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control" id="email" placeholder="Email"
                                    name="email">
                                @error('email')
                                    <p class="text-red-500 my-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    name="password">
                                @error('password')
                                    <p class="text-red-500 my-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark main-bg">Signup</button>
                            </div>
                            <div class="sign-up">
                                Already have an account? <a href="{{ route('user.login') }}">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
