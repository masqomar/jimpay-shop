<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Carce- Mobile app eCommerce Template</title>
    <meta name="Googlebot" content="noindex" />
    <meta name="description" content="Carce is an exclusive ecommerce mobile app template with 2 distinct layouts. This superb mobile app template for ecommerce embodies a professional-looking mobile website design while providing tons of features.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.ico" type="image/png">

    <!-- ::::::::::::::All Google Fonts::::::::::::::-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/icomoon.css" />

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/plugins/ion.rangeSlider.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/vendor.min.css">
<link rel="stylesheet" href="{{asset('assets')}}/css/plugins/plugins.min.css">
<link rel="stylesheet" href="{{asset('assets')}}/css/style.min.css"> -->

</head>

<body>

    <main class="main-wrapper">
        <!-- ...:::Start Login Section:::... -->
        <div class="login-section">
            <div class="container">
                <!-- Start User Event Area -->
                <div class="login-wrapper">
                    <div class="section-content">
                        <h1 class="title">{{ __('Log in.') }}</h1>
                        <p>{{ __('Log in with your data that you entered during registration.') }}</p>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible show fade">
                        <ul class="ms-0 mb-0">
                            @foreach ($errors->all() as $error)
                            <li>
                                <p>{{ $error }}</p>
                            </li>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </ul>
                    </div>
                    @endif

                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="default-form-wrapper">
                        @csrf

                        <ul class="default-form-list">
                            <li class="single-form-item">
                                <label for="name" class="visually-hidden">Name</label>
                                <input type="text" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" autocomplete="email" placeholder="Email" required autofocus>
                                <span class="icon"><i class="icon icon-carce-user"></i></span>
                            </li>
                            <li class="single-form-item">
                                <label for="password" class="visually-hidden">Password</label>
                                <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password" autocomplete="current-password" required>
                                <span class="icon"><i class="icon icon-carce-eye"></i></span>
                            </li>
                        </ul>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-gray-600" for="remember">
                                Keep me logged in
                            </label>
                        </div>

                        <button class="btn--center btn--round btn--size-58-58 btn--color-white btn--radical-red progress-btn progress-btn--50">{{ __('Log in') }}</button>
                    </form>
                </div>

                <div class="create-account-text text-center">
                    {{ __("Don't have an account") }}?
                    <a href="{{url('/register')}}" class="btn--color-radical-red">{{ __('Sign up.') }}</a><br>
                    @if (Route::has('password.request'))
                    <p>
                        <a class="font-bold" href="{{ route('password.request') }}">
                            {{ __('Forgot password') }}?
                        </a>.
                    </p>
                    @endif
                </div>
                <!-- End User Event Area -->
            </div>
        </div>
        <!-- ...:::End User Event Section:::... -->


    </main>

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor -->
    <script src="{{asset('assets')}}/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/jquery-migrate-3.3.2.min.js"></script>

    <!--Plugins JS-->
    <script src="{{asset('assets')}}/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{asset('assets')}}/js/plugins/ion.rangeSlider.min.js"></script>

    <!-- Minify Version -->
    <!-- <script src="{{asset('assets')}}/js/vendor.min.js"></script>
    <script src="{{asset('assets')}}/js/plugins.min.js"></script> -->

    <!--Main JS (Common Activation Codes)-->
    <script src="{{asset('assets')}}/js/main.js"></script>
    <!-- <script src="{{asset('assets')}}/js/main.min.js"></script> -->

</body>

</html>