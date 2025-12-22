
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-layout="horizontal">
<head>

    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Delivery Assignment Management System') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Admin & Dashboards Template" name="description" />
    <meta content="Pixeleyez" name="author" />
    
    <!-- layout setup -->
    <script type="module" src="{{ asset('backend/assets/js/layout-setup.js') }}"></script>
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/k_favicon_32x.png') }}">    <!-- Simplebar Css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/simplebar/simplebar.min.css') }}">
    <!-- Swiper Css -->
    <link href="{{ asset('backend/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Nouislider Css -->
    <link href="{{ asset('backend/assets/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!--icons css-->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

    @include('layouts.header')

    @include('layouts.menus')
   

        <main class="app-wrapper">
           @yield('content') 
        </main>

        @include('layouts.footer')
       
         
    </div>
    <!-- END page -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scroll-top.init.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- File js -->
    <script src="{{ asset('backend/assets/js/dashboard/crm.init.js') }}"></script>
    <!-- App js -->
    <script type="module" src="{{ asset('backend/assets/js/app.js') }}"></script>

</body>
</html>