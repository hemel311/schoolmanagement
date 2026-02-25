<!DOCTYPE html>
<html lang="en">

<head>
@include('addmissionofficer.layout.meta')
    <title>@yield('title')</title>
   @include('addmissionofficer.layout.css')

</head>

<body>

<!--*******************
    Preloader start
********************-->
@include('addmissionofficer.layout.preloader')
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    @include('addmissionofficer.layout.navheader')
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    @include('addmissionofficer.layout.header')
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    @include('addmissionofficer.layout.navigation')
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">

        @yield('body')
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
   @include('addmissionofficer.layout.footer')
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
@include('addmissionofficer.layout.js')

</body>

</html>
