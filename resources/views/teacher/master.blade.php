<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.layout.meta')


    <title>@yield('title')</title>
    @include('teacher.layout.css')

</head>

<body>

<!--*******************
    Preloader start
********************-->
@include('teacher.layout.preloader')
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
   @include('teacher.layout.navheader')
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    @include('teacher.layout.header')
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    @include('teacher.layout.navbar')
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
   @include('teacher.layout.footer')
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
@include('teacher.layout.js')

</body>

</html>
