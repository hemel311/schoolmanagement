<!DOCTYPE html>
<html lang="en">

<head>
    @include('account.layout.meta')

    <title>@yield('title')</title>
    @include('account.layout.css')

</head>

<body>

<!--*******************
    Preloader start
********************-->
@include('account.layout.preloader')
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
   @include('account.layout.navheader')
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    @include('account.layout.header')
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    @include('account.layout.navbar')
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
    @include('account.layout.footer')
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
@include('account.layout.js')

</body>

</html>
