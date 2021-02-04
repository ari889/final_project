@extends('frontend.layouts.app')

@section('main-content')
    <!--    =========== select pool section============ -->
    <section class="pool-select">
        <div class="mid">
            <h1 class="heading">Select your Pool</h1>
            <p class="subtitle">3 pool's packages are offered to you to suit different budgets and end results. The most affordable package starts at 0,0798 ETH</p>
            <div class="select-box-container">
                <div class="select-box">
                    <div class="package-name-wrap">
                        <div class="package-name">Pack silver</div>
                    </div>
                    <a href="#" class="box-content" data-referral_id="@if(Session::has('referral_id')) {{Session::get('referral_id')}} @endif" data-package_name="silver" id="select-package">
                        <div class="top-bar-wrap">
                            <div class="top-bar"></div>
                        </div>
                        <h1 class="select-heading">0, 1218 eth</h1>
                        <h3 class="tagline">60 days circles</h3>
                        <div class="seperator"></div>
                        <ul class="select-list">
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt="">One time payment</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> 7 Circle of 5 Levels each</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> Get paid every day for 60 days and 30 days break for the trade</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> Complete the Pool in 1 year and 8 months</li>
                        </ul>
                        <div class="button"></div>
                    </a>
                </div>
                <div class="select-box">
                    <div class="package-name-wrap">
                        <div class="package-name">Pack gold</div>
                    </div>
                    <a href="#" class="box-content" data-referral_id="@if(Session::has('referral_id')) {{Session::get('referral_id')}} @endif" data-package_name="gold" id="select-package">
                        <div class="top-bar-wrap">
                            <div class="top-bar"></div>
                        </div>
                        <h1 class="select-heading">0,21 ETH</h1>
                        <h3 class="tagline">30 days circles</h3>
                        <div class="seperator"></div>
                        <ul class="select-list">
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt="">One time payment</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> 7 Circle of 5 Levels each</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> Get paid every day for 30 days and 30 days break for the trade.</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> Complete the Pool in 1 year and 2 months</li>
                        </ul>
                        <div class="button"></div>
                    </a>
                </div>
                <div class="select-box">
                    <div class="package-name-wrap">
                        <div class="package-name">Pack bronze</div>
                    </div>
                    <a href="#" class="box-content" data-referral_id="@if(Session::has('referral_id')) {{Session::get('referral_id')}} @endif" data-package_name="bronze" id="select-package">
                        <div class="top-bar-wrap">
                            <div class="top-bar"></div>
                        </div>
                        <h1 class="select-heading">0, 0798 ETH</h1>
                        <h3 class="tagline">90 days circles</h3>
                        <div class="seperator"></div>
                        <ul class="select-list">
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt="">One time payment</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> 7 Circle of 5 Levels each</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> Get paid every day for 90 days and 30 days break for the trade</li>
                            <li class="single-list"><img src="{{asset('frontend/images/check.png')}}" alt=""> Complete the Pool in 2 year and 3 months</li>
                        </ul>
                        <div class="button"></div>
                    </a>
                </div>
            </div>


            <div class="notice">
                <h4>*** The Payment for your Pool will be made only after the Pre Launch. Each Pool consists of 63 members.
                    You will be placed according to your registration date. ***</h4>
                <p>If the number of members needed to complete a pool is not reached you will be put on hold for a new opening.</p>
            </div>
        </div>
    </section>

    @php
        $scripts = ['main'];
    @endphp
@endsection


