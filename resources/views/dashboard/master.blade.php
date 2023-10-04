<!doctype html>
<html lang="en" dir="rtl" class="{{ setting('theme') }}">
@include('dashboard.partials.head')
<body>
    <!--wrapper-->
    <div class="wrapper">
        @include('dashboard.partials.sidebar')
        <!--start header -->
         @include('dashboard.partials.nav')
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @include('dashboard.partials.confirm-popup')
                @yield('content')
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button-->
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            @include('dashboard.partials.footer')
        </div>
        <!--end wrapper-->
        @include('dashboard.partials.searchmodal')
        <!--start switcher-->
        @include('dashboard.partials.colorswitcher')
        <!--end switcher-->
        @include('dashboard.partials.script')
</body>

</html>
