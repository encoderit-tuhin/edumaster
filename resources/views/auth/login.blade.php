@extends('layouts.app')

@section('styles')
    <style>
        body {
            background: #4751b7 !important;
        }

        .login-area {
            box-shadow: 9px 4px 15px 0px #f5f5f54c;
            border-radius: 30px;
            background: #fff;
        }

        .form-control {
            border-radius: 4px;
        }
    </style>
@endsection

@section('title')
    {{ __('Login') }}
@endsection

@section('content')
    <div class="card-header" style="padding: 15px; margin: 0px; margin-bottom: 30px;">
        <div class="container d-flex justify-content-between" style="align-items: center;">
            <a class="" href="{{ route('index') }}">
                <img class="img-fluid for-light text-left" src="{{ get_logo() }}" style="width: 80px;" alt="looginpage">
            </a>

            {{-- Menu Items --}}
            <a href="https://www.youtube.com/channel/UCUVAzMspJYwvMeMpYcXKw3g" class="login-nav-link">
                <i class="fa fa-youtube-play fa-2x text-danger"></i>
                {{ __('Tutorial Center') }}
            </a>


            <div class="d-flex mx-5">
                @include('theme.default.partials.language-chooser')
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row p-2 shadow justify-content-center login-area">
            <div class="col-md-5 border-right">
                <div class="my-5">
                    <h3 class="text-center font-bold page-title">
                        {{ __('Sign In') }}
                    </h3>
                    <div class="card-body">
                        <img class="logo" src="{{ get_logo() }}">
                        <form method="POST" class="form-signin" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row position-relative">
                                <span class="position-absolute icon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input id="email" type="text"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" placeholder="{{ __('Email / Phone ') }}" required autofocus>

                                {{-- TODO --}}
                                {{-- / Student ID / Teacher ID --}}

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row position-relative">
                                <span class="position-absolute icon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    placeholder="{{ __('Password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="custom-control custom-checkbox mb-3 position-relative">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>

                            <!-- Login Button -->
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block login-btn" id="login-btn">
                                        {{ __('Login') }}
                                        <i class="fa fa-sign-in ml-2"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Forgot Password Link -->
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                </div>
                            </div>
                            @if (env('DEMO_MODE'))
                                <div class="mt-1 d-flex justify-content-center">
                                    <button type="button" class=" btn btn-outline-primary mr-1" id="admin-login-btn">
                                        {{ __('Admin') }}
                                    </button>
                                    <button type="button" class="btn btn-outline-primary mr-1" id="student-login-btn">
                                        {{ __('Student') }}
                                    </button>
                                    <button type="button" class="btn btn-outline-primary" id="teacher-login-btn">
                                        {{ __('Teacher') }}
                                    </button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7 text-center">
                <div class="row" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                    <div class="col-12">
                        <img style="height: 200px" src="{{ asset('images/login-bg.png') }}" alt=""
                            class="img-fluid">
                        <h2 class="mb-4 mt-4 border-bottom pb-4 login-instruction">
                            {{ __('Login Instructions') }}
                        </h2>

                        @if (session()->get('login_type') === 'student')
                            <ul>
                                <li>
                                    <span class="text-primary">➩</span>
                                    {{ __('Student will login to his panel with his student id and password.') }}
                                </li>
                                <li>
                                    <span class="text-primary">➩</span>
                                    {{ __('After login he/she will see his/her photo to make sure his panel.') }}
                                </li>
                            </ul>
                        @elseif(session()->get('login_type') === 'teacher')
                            <ul>
                                <li>
                                    <span class="text-primary">➩</span>
                                    {{ __('Teacher will login to his panel with his student id and password.') }}
                                </li>
                                <li>
                                    <span class="text-primary">➩</span>
                                    {{ __('After login he/she will see his/her photo to make sure his panel.') }}
                                </li>
                            </ul>
                        @else
                            <ul>
                                <li>
                                    <span class="text-primary">➩</span>
                                    {{ __('Please login with your ID and Password.') }}
                                </li>
                                <li>
                                    <span class="text-primary">➩</span>
                                    {{ __('After login he/she will see his/her photo to make sure his panel.') }}
                                </li>
                            </ul>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <a class="btn login-btn" href="{{ route('student-online-registration.index') }}">
                                    {{ __('Apply Link') }}
                                    <i class="fa fa-sign-in ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="card" style="background: #323da6; margin-top: 15px; padding: 15px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="pp">
                        <a href="#" target="_Blank">
                            <img src="{{ asset('/images/2.png') }}" class="img-responsive img-fluid"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="pp">
                        <a href="#" target="_Blank">
                            <img src="{{ asset('/images/2.png') }}" class="img-responsive img-fluid"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="pp">
                        <a href="#" target="_Blank">
                            <img src="{{ asset('/images/2.png') }}" class="img-responsive img-fluid"></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="card text-center mt-5" style="padding: 0px; padding-top: 15px; margin: 0px; background: #000">
        <p class="text-white">Powered by <a class="text-info" href="https://squartup.com">Squartup Limited</a></p>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Admin Login
        document.getElementById('admin-login-btn').addEventListener('click', function() {
            document.getElementById('email').value = `nmdc@admin.com`;
            document.getElementById('password').value = `ndcm1234`;
            document.getElementById('login-btn').click();
        });

        // Student Login
        document.getElementById('student-login-btn').addEventListener('click', function() {
            document.getElementById('email').value = `student@example.com`;
            document.getElementById('password').value = `12345678`;
            document.getElementById('login-btn').click();
        });

        // Teacher Login
        document.getElementById('teacher-login-btn').addEventListener('click', function() {
            document.getElementById('email').value = `teacher@example.com`;
            document.getElementById('password').value = `12345678`;
            document.getElementById('login-btn').click();
        });
    });
</script>
