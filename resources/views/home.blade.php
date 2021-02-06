@extends('layouts.app')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            @if(Auth::user() -> mail_activation_status === 'pending')
            <div class="alert alert-danger rounded-0">@lang('messages.emailConfirm') <a href="#">@lang('messages.Click here')</a> @lang('messages.to learn more.')</div>
            @endif

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">@lang('messages.Welcome to CPM')</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">@lang('messages.Currently you have following package')</h4>

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table">
                                        <thead>
                                        <tr>
                                            <th>@lang('messages.Name')</th>
                                            <th data-priority="1">@lang('messages.Selected Package')</th>
                                            <th data-priority="2">@lang('messages.Price')</th>
                                            <th data-priority="3">@lang('messages.Circle Days')</th>
                                            <th data-priority="4">@lang('messages.Remaining Days')</th>
                                            <th data-priority="4">@lang('messages.Refereed By')</th>
                                            <th data-priority="5">@lang('messages.Join at')</th>
                                            <th data-priority="6">@lang('messages.Pool Status')</th>
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
                                            <td>
                                                @php
                                                    $user = \App\Models\User::find($data->referral_id);
                                                    if(!empty($user)){
                                                        echo $user -> first_name.' '.$user -> last_name;
                                                    }else{
                                                        echo 'Admin';
                                                    }
                                                @endphp
                                            </td>
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

