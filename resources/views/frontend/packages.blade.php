@extends('frontend.layouts.app')

@section('main-content')
    <!--    =========== select pool section============ -->
    <section class="pool-select">
        <div class="mid">
            <div class="dropdown">
                <button type="button" class="dropdown-button" data-target="lang">@if(Session::has('locale')){{strtoupper(Session::get('locale'))}}@else {{strtoupper('en')}} @endif</button>
                <ul class="dropdown-menu" id="lang">
                    <li class="dropdown-list"><a href="{{route('locale', ['locale' => 'en'])}}" class="dropdown-link">English</a></li>
                    <li class="dropdown-list"><a href="{{route('locale', ['locale' => 'fr'])}}" class="dropdown-link">French</a></li>
                </ul>
            </div>
            <h1 class="heading">@lang('messages.Select your Pool')</h1>
            <p class="subtitle">@lang('messages.package slogan')</p>
            <div class="select-box-container">
                <div class="select-box">
                    <div class="package-name-wrap">
                        <div class="package-name">@lang('messages.Pack silver')</div>
                    </div>
                    <a href="#" class="box-content" data-referral_id="@if(Session::has('referral_id')) {{Session::get('referral_id')}} @endif" data-package_name="silver" id="select-package">
                        <div class="top-bar-wrap">
                            <div class="top-bar"></div>
                        </div>
                        <h1 class="select-heading">0, 1218 eth</h1>
                        <h3 class="tagline">60 @lang('messages.Days Circles')</h3>
                        <div class="seperator"></div>
                        <ul class="select-list">
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.One time payment')</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.7 Circle of 5 Levels each')</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.paidSilver')</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.completeGold')</li>
                        </ul>
                        <div class="button"></div>
                    </a>
                </div>
                <div class="select-box">
                    <div class="package-name-wrap">
                        <div class="package-name">@lang('messages.Pack gold')</div>
                    </div>
                    <a href="#" class="box-content" data-referral_id="@if(Session::has('referral_id')) {{Session::get('referral_id')}} @endif" data-package_name="gold" id="select-package">
                        <div class="top-bar-wrap">
                            <div class="top-bar"></div>
                        </div>
                        <h1 class="select-heading">0,21 ETH</h1>
                        <h3 class="tagline">30 @lang('messages.Days Circles')</h3>
                        <div class="seperator"></div>
                        <ul class="select-list">
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.One time payment')</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.7 Circle of 5 Levels each')</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.paidGold')</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.completeGold')</li>
                        </ul>
                        <div class="button"></div>
                    </a>
                </div>
                <div class="select-box">
                    <div class="package-name-wrap">
                        <div class="package-name">@lang('messages.Pack bronze')</div>
                    </div>
                    <a href="#" class="box-content" data-referral_id="@if(Session::has('referral_id')) {{Session::get('referral_id')}} @endif" data-package_name="bronze" id="select-package">
                        <div class="top-bar-wrap">
                            <div class="top-bar"></div>
                        </div>
                        <h1 class="select-heading">0, 0798 ETH</h1>
                        <h3 class="tagline">90 @lang('messages.Days Circles')</h3>
                        <div class="seperator"></div>
                        <ul class="select-list">
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.One time payment')</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.7 Circle of 5 Levels each')</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.paidBronze')</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> @lang('messages.completeBronze')</li>
                        </ul>
                        <div class="button"></div>
                    </a>
                </div>
            </div>


            <div class="notice">
                <h4>*** @lang('messages.packageNote') ***</h4>
                <p>@lang('messages.packageNote2')</p>
            </div>
        </div>
    </section>

    @php
        $scripts = ['main'];
    @endphp
@endsection


