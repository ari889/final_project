@extends('frontend.layouts.app')

@section('main-content')
    <section class="register">
        <!-- ====================== register user section ===================== -->
        <div class="register-left">
            <div class="top-bar">
                <a href="https://mycryptopoolmirror.com/" class="logo"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a>
            </div>
            <div class="register-form">
                <h1 class="heading">Create your account</h1>
                <p style="color: #ec4646;font-weight: 700;margin-bottom: 20px;">
                @if(Session::has('Wrong'))
                    {{Session::get('Wrong')}}
                    @endif
                </p>
                @if(isset($referrel_data))
                <div class="alert">
                    <p class="email">Sponsor Email: <strong>{{$referrel_data -> email}}</strong></p>
                    <p class="username">Sponsor Username: <strong>{{$referrel_data -> username}}</strong></p>
                </div>
                @endif
                <form method="POST" action="{{ route('register') }}" class="register-data">
                    @csrf
                    <input type="hidden" value="{{Session::get('package_name')}}" name="package_name">
                    <input type="hidden" value="{{Session::get('referral_id')}}" name="referral_id">
                    <input type="text" name="username" placeholder="Your username" value="{{old('username')}}">
                    @error('username')
                        <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="text" name="email" placeholder="Your email" value="{{old('email')}}">
                    @error('email')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="text" name="first_name" placeholder="Your first name" value="{{old('first_name')}}">
                    @error('first_name')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="text" name="last_name" placeholder="Your last name" value="{{old('last_name')}}">
                    @error('last_name')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="text" name="cell" placeholder="Your mobile number" value="{{old('cell')}}">
                    @error('cell')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="password" name="password" placeholder="Your password" autocomplete="new-password">
                    @error('password')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="password" name="password_confirmation" placeholder="Re-enter password" autocomplete="new-password">
                    @error('password_confirmation')
                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" name="register">Pay out membership <i class="fas fa-angle-right"></i></button>
                </form>
                <p class="login-notice">Already have and account? <a href="{{route('login')}}">Sign In</a></p>
            </div>
        </div>



        <!-- ====================== live counter ===================== -->
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
