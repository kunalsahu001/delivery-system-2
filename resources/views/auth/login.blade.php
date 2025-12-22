
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-layout="vertical">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Delivery Assignment Management System') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Admin & Dashboards Template" name="description" />
    <meta content="Pixeleyez" name="author" />

    <!-- layout setup -->
    <script type="module" src="{{ asset('backend/assets/js/layout-setup.js') }}"></script>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/k_favicon_32x.png') }}">

    <!-- Simplebar Css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/simplebar/simplebar.min.css') }}">
    <!-- Swiper Css -->
    <link href="{{ asset('backend/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Nouislider Css -->
    <link href="{{ asset('backend/assets/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css -->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://janarogyahealthcare.com/backend//my-assets/public/backend/assets/css/parsley.min.css" />

</head>

<body>
<!-- START -->
<div>
    <img src="https://codetheweb.blog/assets/img/posts/css-advanced-background-images/cover.jpg" alt="" class="auth-bg light w-full h-full position-absolute top-0">
    <img src="{{ asset('backend/assets/images/auth/auth_bg_dark.jpg')}}" alt="" class="auth-bg d-none dark">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100 py-10">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card mx-xxl-8">
                    <div class="card-body py-12 px-8">
                        <img src="https://icons.veryicon.com/png/o/business/mall-background-management-linear-icon/delivery-management-4.png" alt="" height="100" class="mb-4 mx-auto d-block">
                        <h6 class="mb-3 mb-8 fw-medium text-center">🔐 Delivery Assignment Management System</h6>
                        @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif
                        <form method="POST" action="{{ route('doLogin') }}" id="loginForm">
                            @csrf
                            <div class="row g-4">
                                <div class="col-12">
                                    <label for="username" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" id="username" placeholder="Enter your Email" data-parsley-required="true"
                                                        data-parsley-required-message="The Email field is required."
                                                        data-parsley-errors-container="#parsleyerror"
                                                        required
                                                        value="" autofocus>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" data-parsley-required="true"
                                                        data-parsley-required-message="The Password field is required."
                                                        data-parsley-errors-container="#parsleyerror"
                                                        required
                                                         value="">
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="form-text">
                                            <a href="#" class="link link-primary text-muted text-decoration-underline">Forgot password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-8">
                                    <button type="submit" class="btn btn-primary w-full mb-4">Sign In<i class="bi bi-box-arrow-in-right ms-1 fs-16"></i></button>
                                </div>
                            </div>
                           
                        </form>
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- JAVASCRIPT -->
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('backend/assets/libs/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ asset('backend/assets/js/scroll-top.init.js')}}"></script>
<script src="https://janarogyahealthcare.com/backend/my-assets/public/backend/assets/js/parsley.min.js"></script>
<script>
  $(function () {
      $('#loginForm').parsley(); // Initialize Parsley on your form
  });
</script>
</body>

</html>