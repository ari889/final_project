<!doctype html>
<html lang="en">

<head>

@include('layouts.partials.head')

</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

@include('layouts.header')

    <!-- ========== Left Sidebar Start ========== -->
    @include('layouts.leftSidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        @section('main-content')
            @show
        <!-- End Page-content -->

    @include('layouts.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
{{--@include('layouts.rightSidebar')--}}
<!-- /Right-bar -->

<!-- Right bar overlay-->
{{--<div class="rightbar-overlay"></div>--}}

@include('layouts.partials.scripts')

</body>
</html>
