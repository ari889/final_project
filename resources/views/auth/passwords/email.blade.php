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
            <div class="register-form">
                <h1 class="heading">Forget password</h1>
                <div class="alert warning">
                    <p><strong>Warning!</strong> Please enter your account email.</p>
                </div>
                <form method="POST" action="{{ route('password.email') }}" class="register-data">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email" autocomplete="email" autofocus required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" name="register">Send Mail</button>
                </form>
            </div>
        </div>


        <!--  ======================== live counter ======================== -->
        <div class="register-right">
            <div class="content">
                <q>Changing the global welth! Connection the coommunity internationaly! The gratest decentralizer platform!</q>

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
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <form method="POST" action="{{ route('password.email') }}">--}}
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

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Send Password Reset Link') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
