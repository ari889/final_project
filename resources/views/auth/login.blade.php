@extends('frontend.layouts.app')

@section('main-content')
    <section class="register">
        <!--  ======================== sign in form ======================== -->
        <div class="register-left">
            <div class="top-bar">
                <a href="https://mycryptopoolmirror.com/" class="logo"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a>
                <div class="dropdown">
                    <button type="button" class="dropdown-button" data-target="lang">@if(Session::has('locale')){{strtoupper(Session::get('locale'))}}@else {{strtoupper('en')}} @endif</button>
                    <ul class="dropdown-menu" id="lang">
                        <li class="dropdown-list"><a href="{{route('locale', ['locale' => 'en'])}}" class="dropdown-link">English</a></li>
                        <li class="dropdown-list"><a href="{{route('locale', ['locale' => 'fr'])}}" class="dropdown-link">French</a></li>
                    </ul>
                </div>
            </div>
            <div class="register-form" >
                <h1 class="heading">@lang('messages.Sing in here')</h1>
                <form class="register-data" method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="text" name="email" placeholder="@lang('messages.Your email')" value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            @lang('messages.'.$message)
                        </strong>
                    </span>
                    @enderror
                    <input type="password" name="password" placeholder="@lang('messages.Your password')" autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('messages.'.$message)</strong>
                                    </span>
                    @enderror
                    <div class="form-bottom">
                        <p class="login-notice" style="margin-top: 0;"><a href="{{route('password.request')}}">@lang('messages.Forgot password?')</a></p>
                        <button type="submit" name="register">@lang('messages.Sign In')</button>
                    </div>
                </form>
                <p class="login-notice">@lang('messages.Have no account?') <a href="https://mycryptopoolmirror.com/">@lang('messages.Sign Up')</a></p>
            </div>
        </div>


        <!--  ======================== live counter ======================== -->
        <div class="register-right">
            <div class="content">
                <q>@lang('messages.slogan')</q>

                <div class="counter">
{{--                    <div class="countertext"><span>1</span><span>2</span><span>3</span></div>--}}
                    <div class="countertext" id="live-register"></div>
                    <p>@lang('messages.Members In Countdown')</p>
                </div>
            </div>
        </div>





    </section>
    @php
    $scripts = ['main', 'liveUserCounter'];
    @endphp
@endsection
