@extends('layouts.app')


@section('main-content')
    <div class="modal fade" id="change-name">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-white">Update profile</h5>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="name-change">
                        <div class="message"></div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" value="{{Auth::user() -> first_name}}">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" value="{{Auth::user() -> last_name}}">
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="password-change">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-white">Change password</h5>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="change-password" data-user_id="{{Auth::user() -> id}}">
                        <div class="message"></div>
                        <div class="form-group">
                            <label for="old-password">Old Password</label>
                            <input type="password" id="old-password" name="old_password" placeholder="Please enter your old password." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <input type="password" id="new-password" name="new_password" placeholder="Please enter new password." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm password." class="form-control">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" checked name="check" value="true">
                            <label class="form-check-label" for="exampleCheck1">Keep me logged in</label>
                        </div>
                        <button type="submit" name="change" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">

{{--                        <div class="page-title-right">--}}
{{--                            <ol class="breadcrumb m-0">--}}
{{--                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>--}}
{{--                                <li class="breadcrumb-item active">Responsive Table</li>--}}
{{--                            </ol>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user mr-3"></i>
                            Account Setting
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-6">Id: <strong>{{Auth::user() -> id}}</strong></div>
                                <div class="col-6">Email: <strong>{{Auth::user() -> email}}</strong></div>
                            </div>
                            <div class="row">
                                <div class="col-6">Password: *************</div>
                                <a href="#" class="text-success" data-toggle="modal" data-target="#password-change"><i class="fas fa-edit"></i> Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-image"></i>
                            Change profile image
                        </div>
                        <div class="card-body">
                            @error('photo')
                            <div class="alert alert-danger">{{$message}} <button type="button" data-dismiss="alert" class="close">&times;</button></div>
                            @enderror
                            @if(Session::has('success'))
                                <div class="alert alert-success mx-2">{{Session::get('success')}} <button type="button" data-dismiss="alert" class="close">&times;</button></div>
                            @endif
                            <form action="{{route('image.update', ['id' => Auth::user() -> id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="photo" class="d-block mx-auto">@if(!empty(Auth::user() -> photo))
                                            <img src="{{asset('media/profileImages/'.Auth::user() -> photo)}}" alt="" class="mx-auto d-block rounded-circle" style="width: 200px;height: 200px;">
                                        @else
                                            <img src="{{asset('images/user.png')}}" alt="" class="mx-auto d-block rounded-circle" style="width: 200px;height: 200px;">
                                        @endif</label>
                                    <input type="file" name="photo" id="photo" class="d-none">
                                </div>
                                <input type="submit" name="submit" value="Change image" class="btn btn-success d-block mx-auto">
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex flex-row justify-content-between align-content-center">
                                <div class="left">
                                    <i class="fas fa-user mr-3"></i>
                                    Personal Information
                                </div>
                                <a href="#" class="btn btn-danger btn-sm rounded-0" data-toggle="modal" data-target="#change-name"><i class="fas fa-edit"></i> Edit</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-6">First name:</div>
                                <div class="col-6">{{Auth::user() -> first_name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Last name:</div>
                                <div class="col-6">{{Auth::user() -> last_name}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-map-marked-alt mr-3"></i>
                            Your verification status
                        </div>
                        <div class="card-body">
                            <h1 class="font-weight-bold text-white">Level 3</h1>
                            <i class="fas fa-clock"></i> Request is pending
                            <a href="#" class="text-success font-weight-bold">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user mr-3"></i>
                            Verified Information
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-6">Email:</div>
                                <div class=" col-6">
                                    <div class="d-flex flex-row justify-content-start align-content-center"><p class="m-0 mr-2">{{Auth::user() -> email}}</p>
                                        @if(Auth::user() -> mail_activation_status === 'pending')
                                            <i class="fas fa-times-circle text-danger" style="margin-top: 5px;"></i>
                                        @else
                                            <i class="fas fa-check-circle text-success" style="margin-top: 5px;"></i>
                                        @endif</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">Cell:</div>
                                <div class=" col-6">
                                    <div class="d-flex flex-row justify-content-start align-content-center"><p class="m-0 mr-2">{{Auth::user() -> cell}}</p> <i class="fas fa-times-circle text-danger" style="margin-top: 5px;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>

    @php
        $scripts = ['main'];
    @endphp
@endsection

