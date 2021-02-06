@extends('layouts.app')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>@lang('messages.Your referral is')</h3>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Referral link" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{route('packages.session', Auth::user() -> id)}}" id="copy-text">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success" id="copy-link">@lang('messages.Copy')</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-borderless text-center">
                            <thead>
                            <tr>
                                <th scope="col">@lang('messages.Visit')</th>
                                <th scope="col">@lang('messages.Registration')</th>
                                <th scope="col">@lang('messages.Conversion')</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><h3>{{$user_data -> visit}}</h3></td>
                                <td><h3>{{$user_data -> registered}}</h3></td>
                                <td><h3>@if($user_data -> visit == 0)
                                0
                                @else
                                {{($user_data -> registered / $user_data -> visit) * 100}}
                                @endif%</h3></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>@lang('messages.Referred user')</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">@lang('messages.Name')</th>
                                        <th scope="col">@lang('messages.Email')</th>
                                        <th scope="col">@lang('messages.Package')</th>
                                        <th scope="col">@lang('messages.Price')</th>
                                        <th scope="col">@lang('messages.Total rewards')</th>
                                        <th scope="col">@lang('messages.Registered at')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($referral as $ru)
                                        <tr>
                                            <th scope="row">{{$loop -> index + 1}}</th>
                                            <td>@php
                                                    $username = $ru -> username;
                                                    $length = strlen($username) - 1;
                                                    $new_name = substr($username, 0, 1);
                                                    echo $new_name.str_repeat('*', $length);
                                                    @endphp</td>
                                            <td>@php
                                                    $email = $ru -> email;
                                                    $ex_email = explode('@', $email);
                                                    $mail_name = $ex_email[0];
                                                    $name_length = strlen($mail_name);
                                                    $get_first_letter = substr($mail_name, 0, 1);
                                                    echo $get_first_letter.str_repeat('*', $name_length).'@';
                                                    $mail_host = end($ex_email);
                                                    $new_host = explode('.', $mail_host);
                                                    $last_element = $new_host[0];
                                                    $mail_name_length = strlen($last_element);
                                                    $get_mail_first_letter = substr($last_element, 0 , 1);
                                                    echo $get_mail_first_letter.str_repeat('*', $mail_name_length).'.'.end($new_host);
                                            @endphp</td>
                                            <td>{{$ru -> package_name}}</td>
                                            <td>{{$ru -> price}}</td>
                                            <td>2.1 ETH</td>
                                            <td>{{ \Carbon\Carbon::parse($ru -> created_at)->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
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
