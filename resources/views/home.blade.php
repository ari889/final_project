@extends('layouts.app')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            @if(Auth::user() -> mail_activation_status === 'pending')
            <div class="alert alert-danger rounded-0">Please confirm your email address. <a href="#">Click here</a> to learn more.</div>
            @endif

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Welcome to CPM</h4>

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">Currently you have following package</h4>

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th data-priority="1">Selected Package</th>
                                            <th data-priority="2">Price</th>
                                            <th data-priority="3">Circle Days</th>
                                            <th data-priority="4">Remaining Days</th>
                                            <th data-priority="4">Refereed By</th>
                                            <th data-priority="5">Join at</th>
                                            <th data-priority="6">Pool Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user_data as $data)
                                        <tr>
                                            <td>{{$data -> first_name}} {{$data -> last_name}}</td>
                                            <td>{{ucfirst($data -> package_name)}}</td>
                                            <td>{{$data -> price}}</td>
                                            <td>{{$data -> circle_days}} Days</td>
                                            <td>- Days</td>
                                            <td>@php
                                                    $user = \App\Models\User::where( 'id', '=', $data -> referral_id)->first();
                                                    @endphp {{$user->first_name}} {{$user -> last_name}}</td>
                                            <td>{{ \Carbon\Carbon::parse($data -> created_at)->diffForHumans() }}</td>
                                            <td>{{ucfirst($data -> status)}}</td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection

