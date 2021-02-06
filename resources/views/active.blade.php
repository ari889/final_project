@extends('layouts.app')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Email verification status</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="content text-center">
                @if($status === 'error')
                    <i class="fas fa-times-circle mb-3 text-danger" style="font-size: 70px;"></i>
                    <p>Hi {{Auth::user() -> first_name}}, the link you chosen is expired. Please try another one.</p>
                @else
                    <i class="fas fa-check-circle mb-3 text-success" style="font-size: 70px;"></i>
                    <p>Hi {{Auth::user() -> first_name}}, your account has been activated.</p>
                @endif
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection

