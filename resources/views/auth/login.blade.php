@extends('frontend.layouts.app')

@section('main-content')
    <section class="register">
        <!--  ======================== sign in form ======================== -->
        <div class="register-left">
            <div class="top-bar">
                <a href="https://mycryptopoolmirror.com/" class="logo"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a>
                <div class="dropdown">
                    <button type="button" class="dropdown-button" data-target="lang">{{strtoupper(Session::get('locale'))}}</button>
                    <ul class="dropdown-menu" id="lang">
                        <li class="dropdown-list"><a href="{{route('locale', ['locale' => 'en'])}}" class="dropdown-link">English</a></li>
                        <li class="dropdown-list"><a href="{{route('locale', ['locale' => 'bn'])}}" class="dropdown-link">Bangla</a></li>
                    </ul>
                </div>
            </div>
            @lang('messages.laravel')
            <div class="register-form" >
                <h1 class="heading">Sing in here</h1>
                <!--                <div class="alert">-->
                <!--                    <p class="email">Sponsor Email: <strong>admin@gmail.com</strong></p>-->
                <!--                    <p class="username">Sponsor Username: <strong>admin</strong></p>-->
                <!--                </div>-->
                <form class="register-data" method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="text" name="email" placeholder="Your email" value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="password" name="password" placeholder="Your password" autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="form-bottom">
                        <p class="login-notice" style="margin-top: 0;"><a href="{{route('password.request')}}">Forgot password? </a></p>
                        <button type="submit" name="register">Sign In</button>
                    </div>
                </form>
                <p class="login-notice">Have no account? <a href="https://mycryptopoolmirror.com/">Sign Up</a></p>
            </div>
        </div>


        <!--  ======================== live counter ======================== -->
        <div class="register-right">
            <div class="content">
                <q>Changing the global wealth!<br>
                connecting the community internationally!<br>The greatest decentralize platform</q>

                <div class="counter">
{{--                    <div class="countertext"><span>1</span><span>2</span><span>3</span></div>--}}
                    <div class="countertext" id="live-register"></div>
                    <p>Members in countdown</p>
                </div>
            </div>
        </div>





    </section>
    @php
    $scripts = ['main', 'liveUserCounter'];
    @endphp
@endsection

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
