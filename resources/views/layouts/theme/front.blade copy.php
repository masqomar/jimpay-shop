<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
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

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>

<body>

    <main class="main-wrapper">

        <!-- ...:::Start User Event Section:::... -->
        <div class="header-section">
            <div class="container">
                <!-- Start User Event Area -->
                <div class="header-area">
                    <div class="header-top-area header-top-area--style-1">
                        <ul class="event-list">
                            <li class="list-item"><a href="#mobile-menu-offcanvas" area-label="mobile menu offcanvas svg icon" class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow main-menu offcanvas-toggle offside-menu">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                        <g id="Group_1" data-name="Group 1" transform="translate(-28 -63)">
                                            <path id="Rectangle_3" data-name="Rectangle 3" d="M0,0H5A2,2,0,0,1,7,2V5A2,2,0,0,1,5,7H2A2,2,0,0,1,0,5V0A0,0,0,0,1,0,0Z" transform="translate(28 63)" fill="#ff375f" />
                                            <path id="Rectangle_6" data-name="Rectangle 6" d="M2,0H5A2,2,0,0,1,7,2V5A2,2,0,0,1,5,7H0A0,0,0,0,1,0,7V2A2,2,0,0,1,2,0Z" transform="translate(28 72)" fill="#ff375f" />
                                            <path id="Rectangle_4" data-name="Rectangle 4" d="M2,0H7A0,0,0,0,1,7,0V5A2,2,0,0,1,5,7H2A2,2,0,0,1,0,5V2A2,2,0,0,1,2,0Z" transform="translate(37 63)" fill="#ff375f" />
                                            <path id="Rectangle_5" data-name="Rectangle 5" d="M2,0H5A2,2,0,0,1,7,2V7A0,0,0,0,1,7,7H2A2,2,0,0,1,0,5V2A2,2,0,0,1,2,0Z" transform="translate(37 72)" fill="#ff375f" />
                                        </g>
                                    </svg>
                                </a></li>
                            <li class="list-item">
                                <h2 class="title text-center">@yield('title')</h2>
                            </li>
                            <li class="list-item">
                                @yield ('cart')
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End User Event Area -->
            </div>
        </div>
        <!-- ...:::End User Event Section:::... -->

        <!--  Start Offcanvas Mobile Menu Section -->
        <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-leftside offcanvas-mobile-menu-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header flex-end">

                <div class="logo">
                    <a href="index.html"><img class="img-fluid" width="147" height="26" src="{{asset('assets')}}/images/logo.png" alt="image"></a>
                </div>

                <button class="offcanvas-close" aria-label="offcanvas svg icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="5.973" height="10.449" viewBox="0 0 5.973 10.449">
                        <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M13.051,11.417,17,7.466a.747.747,0,0,0-1.058-1.054l-4.479,4.476a.745.745,0,0,0-.022,1.03l4.5,4.507A.747.747,0,1,0,17,15.37Z" transform="translate(-11.251 -6.194)" />
                    </svg>
                </button>
            </div>
            <!-- End Offcanvas Header -->

            @include('layouts.theme.partials.sidebar')
        </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->



        <div class="offcanvas-overlay"></div>
        @yield ('content')
        <footer class="footer-section"></footer>
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

    <!-- Fontawesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>

    <script>
        function filterFunction(that, event) {
            let container, input, filter, li, input_val;
            container = $(that).closest(".searchable");
            input_val = container.find("input").val().toUpperCase();
            if (["ArrowDown", "ArrowUp", "Enter"].indexOf(event.key) != -1) {
                keyControl(event, container);
            } else {
                li = container.find("ul li");
                li.each(function(i, obj) {
                    if ($(this).text().toUpperCase().indexOf(input_val) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
                container.find("ul li").removeClass("selected");
                setTimeout(function() {
                    container.find("ul li:visible").first().addClass("selected");
                }, 100);
            }
        }

        function keyControl(e, container) {
            if (e.key == "ArrowDown") {
                if (container.find("ul li").hasClass("selected")) {
                    if (
                        container
                        .find("ul li:visible")
                        .index(container.find("ul li.selected")) +
                        1 <
                        container.find("ul li:visible").length
                    ) {
                        container
                            .find("ul li.selected")
                            .removeClass("selected")
                            .nextAll()
                            .not('[style*="display: none"]')
                            .first()
                            .addClass("selected");
                    }
                } else {
                    container.find("ul li:first-child").addClass("selected");
                }
            } else if (e.key == "ArrowUp") {
                if (
                    container.find("ul li:visible").index(container.find("ul li.selected")) >
                    0
                ) {
                    container
                        .find("ul li.selected")
                        .removeClass("selected")
                        .prevAll()
                        .not('[style*="display: none"]')
                        .first()
                        .addClass("selected");
                }
            } else if (e.key == "Enter") {
                container.find("input").val(container.find("ul li.selected").text()).blur();
                onSelect(container.find("ul li.selected").text());
            }
        }

        function onSelect(val) {}
        $(".searchable input").focus(function() {
            $(this).closest(".searchable").find("ul").show();
            $(this).closest(".searchable").find("ul li").show();
            $('.submit__btn').css({
                "display": "block"
            })
            $('.close__btn').css({
                "display": "block"
            })
            $('.search__btn').css({
                'display': "none"
            })
        });
        $(".searchable input").blur(function() {
            let that = this;
            setTimeout(function() {
                $(that).closest(".searchable").find("ul").hide();
                $('.search__btn').css({
                    'display': "block"
                })
                $('.submit__btn').css({
                    "display": "none"
                })
                $('.close__btn').css({
                    "display": "none"
                })
            }, 300);
        });
        $('.search__btn').on("click", function() {
            $(this).closest(".searchable").find("input").val($(this).text()).blur();
            onSelect($(this).text());
        });
        $(document).on("click", ".searchable ul li", function() {
            $(this).closest(".searchable").find("input").val($(this).text()).blur();
            onSelect($(this).text());
        });
        $(".searchable ul li").hover(function() {
            $(this).closest(".searchable").find("ul li.selected").removeClass("selected");
            $(this).addClass("selected");
        });
        $('.close__btn').on('click', function() {
            $('.searchable').find("input").val($(this).text()).blur()
            $(this).css({
                "display": "none"
            })
        })
    </script>

</body>

</html>