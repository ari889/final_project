<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('home')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="40">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="70">
                                </span>
                </a>

                <a href="{{route('home')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="40">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="70">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- App Search-->
{{--            <form class="app-search d-none d-lg-block">--}}
{{--                <div class="position-relative">--}}
{{--                    <input type="text" class="form-control" placeholder="Search...">--}}
{{--                    <span class="ri-search-line"></span>--}}
{{--                </div>--}}
{{--            </form>--}}
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item waves-effect"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Session::has('locale'))
                        @if(Session::get('locale') === 'en')
                            <img class="" src="{{asset('images/flags/us.jpg')}}" alt="Header Language" height="16">
                        @else
                            <img class="" src="{{asset('images/flags/french.jpg')}}" alt="Header Language" height="16">
                        @endif
                    @else
                        <img class="" src="{{asset('images/flags/us.jpg')}}" alt="Header Language" height="16">
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                    <!-- item-->
                    <a href="{{route('locale', ['locale' => 'en'])}}" class="dropdown-item notify-item">
                        <img src="{{asset('images/flags/us.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">English</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('locale', ['locale' => 'fr'])}}" class="dropdown-item notify-item">
                        <img src="{{asset('images/flags/french.jpg')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">French</span>
                    </a>

                </div>
            </div>

{{--            <div class="dropdown d-none d-lg-inline-block ml-1">--}}
{{--                <button type="button" class="btn header-item noti-icon waves-effect"--}}
{{--                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    <i class="ri-apps-2-line"></i>--}}
{{--                </button>--}}
{{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                    <div class="px-lg-2">--}}
{{--                        <div class="row no-gutters">--}}
{{--                            <div class="col">--}}
{{--                                <a class="dropdown-icon-item" href="#">--}}
{{--                                    <img src="{{asset('images/brands/github.png')}}" alt="Github">--}}
{{--                                    <span>GitHub</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <a class="dropdown-icon-item" href="#">--}}
{{--                                    <img src="{{asset('images/brands/bitbucket.png')}}" alt="bitbucket">--}}
{{--                                    <span>Bitbucket</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <a class="dropdown-icon-item" href="#">--}}
{{--                                    <img src="{{asset('images/brands/dribbble.png')}}" alt="dribbble">--}}
{{--                                    <span>Dribbble</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row no-gutters">--}}
{{--                            <div class="col">--}}
{{--                                <a class="dropdown-icon-item" href="#">--}}
{{--                                    <img src="{{asset('images/brands/dropbox.png')}}" alt="dropbox">--}}
{{--                                    <span>Dropbox</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <a class="dropdown-icon-item" href="#">--}}
{{--                                    <img src="{{asset('images/brands/mail_chimp.png')}}" alt="mail_chimp">--}}
{{--                                    <span>Mail Chimp</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <a class="dropdown-icon-item" href="#">--}}
{{--                                    <img src="{{asset('images/brands/slack.png')}}" alt="slack">--}}
{{--                                    <span>Slack</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-notification-3-line"></i>
                    <span class="noti-dot"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small"> @lang('messages.View All')</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Keeping this feature for phase 2</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Keeping this feature for phase 2</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <img src="{{asset('images/users/avatar-3.jpg')}}"
                                     class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">James Lemire</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="ri-checkbox-circle-line"></i>
                                                </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <img src="{{asset('images/users/avatar-4.jpg')}}"
                                     class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle mr-1"></i> @lang('messages.View More')..
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(!empty(Auth::user() -> photo))
                        <img src="{{asset('media/profileImages/'.Auth::user() -> photo)}}" alt="" class="rounded-circle header-profile-user">
                    @else
                        <img src="{{asset('images/user.png')}}" alt="" class="rounded-circle header-profile-user">
                    @endif
                    <span class="d-none d-xl-inline-block ml-1">{{Auth::user() -> first_name}} {{Auth::user() -> last_name}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('dashboard.profile')}}"><i class="ri-user-line align-middle mr-1"></i> @lang('messages.Profile')</a>
                    <div class="dropdown-divider"></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i> @lang('messages.Logout')</button>
                    </form>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
{{--                    <a class="dropdown-item text-danger" href="#"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout</a>--}}
                </div>
            </div>

{{--            <div class="dropdown d-inline-block">--}}
{{--                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">--}}
{{--                    <i class="ri-settings-2-line"></i>--}}
{{--                </button>--}}
{{--            </div>--}}

        </div>
    </div>
</header>
