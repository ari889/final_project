<!doctype html>
<html lang="en">

<head>

    @include('layouts.partials.head')

    <style>
        .content{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

</head>

<body data-sidebar="dark">

<div class="content-wrapper position-relative w-100 vh-100">
    <div class="content text-center">
        <i class="fas fa-times-circle mb-3 text-danger" style="font-size: 70px;"></i>
        <p>Hi {{Auth::user() -> first_name}}, @lang('messages.payment verify')</p>
        <div class="btn-group">
            <a href="{{route('register.payment')}}" class="btn btn-primary rounded-0">@lang('messages.Confirm Payment')</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger rounded-0"><i class="ri-shut-down-line align-middle mr-1"></i> @lang('messages.Logout')</button>
            </form>
        </div>
    </div>
</div>

@include('layouts.partials.scripts')

</body>
</html>

