@extends('layouts.app')


@section('main-content')
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

            <div class="row" style="height: 100%;">
                <div class="col-6" style="margin: auto;">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="font-weight-bold text-white">Submit a request</h1>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}} <button type="button" data-dismiss="alert" class="close">&times;</button></div>
                            @endif
                            <form action="{{route('dashboard.createHelp')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Subject</label>
                                    <input type="text" id="name" name="subject" class="form-control" value="{{old('subject')}}">
                                    @error('subject')
                                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="message" cols="30" rows="10" name="message" class="form-control">{{old('message')}}</textarea>
                                    @error('message')
                                    <span style="color: #ec4646;font-weight: 700;margin-bottom: 20px;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection

