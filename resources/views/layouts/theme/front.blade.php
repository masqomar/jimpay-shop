<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.ico" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/icomoon.css" />

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/plugins/ion.rangeSlider.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">

</head>

<body>

    <style>
        body {
            margin: 0px;
            font-family: raleway;
        }

        .header {
            width: 100%;
            height: 60px;
            background-color: #FF6263;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            position: fixed;
            top: 0px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            z-index: 100;
        }

        .header1 {
            width: 100%;
            height: 50px;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            text-align: center;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;

        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>

    <body>
        <!--Header-->
        <div class="header">
            <div id="mySidenav" class="sidenav">

                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                @guest
                @if (Route::has('login'))
                <a href="{{url('/')}}"><span>Home</span></a>
                <a href="{{url('login')}}"><span>Login</span></a>
                @endif

                @else
                @if (auth()->user()->level === 'Admin')
                <a href="{{url('/dashboard')}}"><span>Home</span></a>
                @endif

                @if (auth()->user()->level !== 'Admin')
                <a href="{{url('/member/dashboard')}}"><span>Home</span></a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span>Logout</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endif
                @endguest

            </div>
            <div class="header-section">
                <div class="container">
                    <!-- Start User Event Area -->
                    <div class="header-area">
                        <div class="header-top-area header-top-area--style-1">
                            <ul class="event-list">
                                <li class="list-item">
                                    <a href="#" style="font-size:30px;cursor:pointer" onclick="openNav()" area-label="mobile menu offcanvas svg icon" class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow main-menu offcanvas-toggle offside-menu">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                            <g id="Group_1" data-name="Group 1" transform="translate(-28 -63)">
                                                <path id="Rectangle_3" data-name="Rectangle 3" d="M0,0H5A2,2,0,0,1,7,2V5A2,2,0,0,1,5,7H2A2,2,0,0,1,0,5V0A0,0,0,0,1,0,0Z" transform="translate(28 63)" fill="#ff375f" />
                                                <path id="Rectangle_6" data-name="Rectangle 6" d="M2,0H5A2,2,0,0,1,7,2V5A2,2,0,0,1,5,7H0A0,0,0,0,1,0,7V2A2,2,0,0,1,2,0Z" transform="translate(28 72)" fill="#ff375f" />
                                                <path id="Rectangle_4" data-name="Rectangle 4" d="M2,0H7A0,0,0,0,1,7,0V5A2,2,0,0,1,5,7H2A2,2,0,0,1,0,5V2A2,2,0,0,1,2,0Z" transform="translate(37 63)" fill="#ff375f" />
                                                <path id="Rectangle_5" data-name="Rectangle 5" d="M2,0H5A2,2,0,0,1,7,2V7A0,0,0,0,1,7,7H2A2,2,0,0,1,0,5V2A2,2,0,0,1,2,0Z" transform="translate(37 72)" fill="#ff375f" />
                                            </g>
                                        </svg>
                                    </a>
                                </li>
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
            <!--Ganti Logo pada bagian src-->
        </div>
        <div class="header1"></div>


        <div class="offcanvas-overlay"></div>
        @yield ('content')
        <footer class="footer-section"></footer>




        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
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

            function openNav() {
                document.getElementById("mySidenav").style.width = "100%";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>