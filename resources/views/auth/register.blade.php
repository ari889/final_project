@extends('frontend.layouts.app')

@section('main-content')
    <section class="register">
        <!-- ====================== register user section ===================== -->
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
            <div class="register-form">
                <h1 class="heading">@lang('messages.Create your account')</h1>
                <p style="color: #ec4646;font-weight: 700;margin-bottom: 20px;">
                @if(Session::has('Wrong'))
                    @lang('messages.'.Session::get('Wrong'))
                    @endif
                </p>
                @if(isset($referrel_data))
                <div class="alert">
                    <p class="email">@lang('messages.Sponsor Email'): <strong>{{$referrel_data -> email}}</strong></p>
                    <p class="username">@lang('messages.Sponsor Username'): <strong>{{$referrel_data -> username}}</strong></p>
                </div>
                @endif
                <form method="POST" action="{{ route('register') }}" class="register-data">
                    @csrf
                    <input type="hidden" value="{{Session::get('package_name')}}" name="package_name">
                    <input type="hidden" value="{{Session::get('referral_id')}}" name="referral_id">
                    <input type="text" name="username" placeholder="Your username" value="{{old('username')}}">
                    @error('username')
                        <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>@lang('messages.'.$message)</strong>
                        </span>
                    @enderror
                    <input type="text" name="email" placeholder="@lang('messages.Your email')" value="{{old('email')}}">
                    @error('email')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>@lang('messages.'.$message)</strong>
                        </span>
                    @enderror
                    <input type="text" name="first_name" placeholder="@lang('messages.Your first name')" value="{{old('first_name')}}">
                    @error('first_name')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>@lang('messages.'.$message)</strong>
                        </span>
                    @enderror
                    <input type="text" name="last_name" placeholder="@lang('messages.Your last name')" value="{{old('last_name')}}">
                    @error('last_name')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>@lang('messages.'.$message)</strong>
                        </span>
                    @enderror
                    <input type="text" name="cell" placeholder="@lang('messages.Your mobile number')" value="{{old('cell')}}">
                    @error('cell')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>@lang('messages.'.$message)</strong>
                        </span>
                    @enderror
                    <input type="password" name="password" placeholder="@lang('messages.Your password')" autocomplete="new-password">
                    @error('password')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>@lang('messages.'.$message)</strong>
                        </span>
                    @enderror
                    <input type="password" name="password_confirmation" placeholder="@lang('messages.Re-enter password')" autocomplete="new-password">
                    @error('password_confirmation')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>@lang('messages.'.$message)</strong>
                        </span>
                    @enderror
                    <button type="submit" name="register">@lang('messages.Pay out membership') <i class="fas fa-angle-right"></i></button>
                </form>
                <p class="login-notice">@lang('messages.Already have and account?') <a href="{{route('login')}}">@lang('messages.Sign In')</a></p>
            </div>
        </div>



        <!-- ====================== live counter ===================== -->
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
