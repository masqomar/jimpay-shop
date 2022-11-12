<!DOCTYPE html>
<html>

<head>
    <title>Template 1</title>
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
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Clients</a>
                <a href="#">Contact</a>
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


        <!--Carousell-->

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-top: 20px;width: 90%;margin-right: auto;margin-left: auto;">
            <div class="carousel-inner" style="border-radius: 20px;">
                <div class="carousel-item active" style="border-radius: 10px;">
                    <img src="https://i.ibb.co/kGCVB9S/Desain-tanpa-judul-2022-10-10-T192038-528.png" class="d-block w-100" alt="...">
                    <!--Ganti Slide Banner dibagian src-->
                </div>
                <div class="carousel-item">
                    <img src="https://i.ibb.co/4jG3fpB/Desain-tanpa-judul-2022-10-10-T192219-061.png" class="d-block w-100" alt="...">
                    <!--Ganti Slide Banner dibagian src-->
                </div>
                <div class="carousel-item">
                    <img src="https://i.ibb.co/cJcwtBt/Desain-tanpa-judul-2022-10-10-T192324-541.png" class="d-block w-100" alt="...">
                    <!--Ganti Slide Banner dibagian src-->
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>




        <!--Money-->

        <style>
            .money1 {
                width: 90%;
                height: 80px;
                background-color: #FF6263;
                margin-right: auto;
                margin-left: auto;
                margin-top: 20px;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                border-radius: 10px;
            }

            .money2 {
                width: 50%;
                height: 80px;
                float: left;
            }

            .money3 {
                width: 85%;
                height: 65px;
                background-color: white;
                margin-right: auto;
                margin-left: auto;
                border-radius: 10px;
            }
        </style>

        <div class="money1">
            <div class="money2">
                <div class="money3" style="margin-top: 8px;">
                    <a type="text" style="font-size: 14px;font-weight: bold;position: relative;top: 8px;left: 10px;">
                        Saldo Anda
                        <p>
                            Rp 50.000
                            <!--Ganti dengan Kode html contoh {saldo}-->
                        </p>
                    </a>
                </div>
            </div>

            <div class="money2" style="width: 25%;text-align: center;">
                <a href="#" type="text" style="position: relative;top: 15px;text-decoration: none;">
                    <!--Masukan Link pada bagaian href-->
                    <img src="https://i.ibb.co/nw7kGYb/Desain-tanpa-judul-2022-10-11-T134142-486.png" style="width: 35px;height: 35px;">
                    <!--Ganti Icon pada bagian src-->
                    <p style="font-size: 12px;font-weight: bold;color: white;">
                        Top Up
                    </p>
                </a>
            </div>

            <div class="money2" style="width: 25%;">
                <a href="#" type="text" style="position: relative;top: 15px;text-decoration: none;">
                    <!--Masukan Link pada bagaian href-->
                    <img src="https://i.ibb.co/fk1XS88/Desain-tanpa-judul-2022-10-11-T134256-261.png" style="width: 35px;height: 35px;">
                    <!--Ganti Icon pada bagian src-->
                    <p style="font-size: 12px;font-weight: bold;color: white;">
                        Withdraw
                    </p>
                </a>
            </div>
        </div>




        <!--Menu-->

        <style>
            .menu1 {
                width: 90%;
                margin-right: auto;
                margin-left: auto;
                margin-top: 20px;
            }
        </style>

        <div class="menu1">
            <div class="container text-center">
                <div class="row row-cols-4">
                    <div class="col">
                        <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='#'">
                            <!--Masukan Link pada bagian href-->
                            <img src="https://i.ibb.co/2kD8RGD/Desain-tanpa-judul-2022-10-11-T135559-949.png" style="width: 100%;">
                            <!--Ganti Icon pada bagian src-->
                            <p style="font-size: 0.7vw,">
                                Motor
                            </p>
                        </button>
                    </div>

                    <div class="col">
                        <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='#'">
                            <!--Masukan Link pada bagian href-->
                            <img src="https://i.ibb.co/2kD8RGD/Desain-tanpa-judul-2022-10-11-T135559-949.png" style="width: 100%;">
                            <!--Ganti Icon pada bagian src-->
                            <p style="font-size: 0.7vw,">
                                Mobil
                            </p>
                        </button>
                    </div>

                    <div class="col">
                        <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='#'">
                            <!--Masukan Link pada bagian href-->
                            <img src="https://i.ibb.co/2kD8RGD/Desain-tanpa-judul-2022-10-11-T135559-949.png" style="width: 100%;">
                            <!--Ganti Icon pada bagian src-->
                            <p style="font-size: 0.7vw,">
                                Makanan
                            </p>
                        </button>
                    </div>

                    <div class="col">
                        <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='#'">
                            <!--Masukan Link pada bagian href-->
                            <img src="https://i.ibb.co/2kD8RGD/Desain-tanpa-judul-2022-10-11-T135559-949.png" style="width: 100%;">
                            <!--Ganti Icon pada bagian src-->
                            <p style="font-size: 0.7vw,">
                                Kirim
                            </p>
                        </button>
                    </div>

                </div>
            </div>


            <div class="container text-center">
                <div class="row row-cols-4">
                    <div class="col">
                        <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href=''">
                            <!--Masukan Link pada bagian href-->
                            <img src="https://i.ibb.co/2kD8RGD/Desain-tanpa-judul-2022-10-11-T135559-949.png" style="width: 100%;">
                            <!--Ganti Icon pada bagian src-->
                            <p style="font-size: 0.7vw,">
                                Truck
                            </p>
                        </button>
                    </div>

                    <div class="col">
                        <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='#'">
                            <!--Masukan Link pada bagian href-->
                            <img src="https://i.ibb.co/2kD8RGD/Desain-tanpa-judul-2022-10-11-T135559-949.png" style="width: 100%;">
                            <!--Ganti Icon pada bagian src-->
                            <p style="font-size: 0.7vw,">
                                Clean
                            </p>
                        </button>
                    </div>

                    <div class="col">
                        <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='#'">
                            <!--Masukan Link pada bagian href-->
                            <img src="https://i.ibb.co/2kD8RGD/Desain-tanpa-judul-2022-10-11-T135559-949.png" style="width: 100%;">
                            <!--Ganti Icon pada bagian src-->
                            <p style="font-size: 0.7vw,">
                                Pulsa
                            </p>
                        </button>
                    </div>

                    <div class="col">
                        <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='#'">
                            <!--Masukan Link pada bagian href-->
                            <img src="https://i.ibb.co/2kD8RGD/Desain-tanpa-judul-2022-10-11-T135559-949.png" style="width: 100%;">
                            <!--Ganti Icon pada bagian src-->
                            <p style="font-size: 0.7vw,">
                                Lainnya
                            </p>
                        </button>
                    </div>

                </div>
            </div>
        </div>



        <!--iklan1-->

        <style>
            .iklan1 {
                width: 90%;
                margin-right: auto;
                margin-left: auto;
                margin-top: 20px;
            }

            .iklan2 {
                width: 90%;
                margin-right: auto;
                margin-left: auto;
                border-radius: 10px;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            }
        </style>

        <div class="iklan1">
            <p style="font-size: 4vw;font-weight: bold;">
                Segala kebutuhan mu ada disini!
            </p>
        </div>

        <div class="iklan2">
            <a href="#">
                <!--Masukan Link pada bagian href-->
                <img src="https://i.ibb.co/hY4YNjg/Desain-tanpa-judul-2022-10-11-T141033-504.png" style="width: 100%;border-radius: 10px;">
                <!--Ganti Banner pada bagian src-->
            </a>
        </div>




        <!--catalog-->

        <div class="iklan1" style="margin-top: 40px;">
            <p style="font-size: 4vw;font-weight: bold;">
                Pilihan terbaik!
            </p>
        </div>

        <style>
            .pilihan1 {
                width: 93%;
                display: flex;
                overflow: auto;
                margin-right: auto;
                margin-left: auto;
            }

            .pilihan2 {
                width: 40%;
                float: left;
                flex-shrink: 0;
                margin: 5px;
            }
        </style>

        <div class="pilihan1">
            <div class="pilihan2">
                <a href="#">
                    <!--Masukan Link pada bagian href-->
                    <img src="https://i.ibb.co/6wc6QhJ/Desain-tanpa-judul-2022-10-11-T143519-885.png" style="width: 100%;">
                    <!--Ganti Banner pada bagian src-->
                </a>
                <p style="font-size: 4vw;">
                    Jadilah Pemenang Lomba Ilustrasi!
                </p>
            </div>

            <div class="pilihan2">
                <a href="#">
                    <!--Masukan Link pada bagian href-->
                    <img src="https://i.ibb.co/zbt8ng3/Desain-tanpa-judul-2022-10-11-T144332-655.png" style="width: 100%;">
                    <!--Ganti Banner pada bagian src-->
                </a>
                <p style="font-size: 4vw;">
                    Sale 50%!!! Khusus Hari ini!
                </p>
            </div>

            <div class="pilihan2">
                <a href="#">
                    <!--Masukan Link pada bagian href-->
                    <img src="https://i.ibb.co/F0HFx7h/Desain-tanpa-judul-2022-10-11-T144511-855.png" style="width: 100%;">
                    <!--Ganti Banner pada bagian src-->
                </a>
                <p style="font-size: 4vw;">
                    Paket Suguhan Sehatmu!
                </p>
            </div>

            <div class="pilihan2">
                <a href="#">
                    <!--Masukan Link pada bagian href-->
                    <img src="https://i.ibb.co/KV0Cnqy/Desain-tanpa-judul-2022-10-11-T144644-832.png" style="width: 100%;">
                    <!--Ganti Banner pada bagian src-->
                </a>
                <p style="font-size: 4vw;">
                    Webinar bersama para senior!
                </p>
            </div>

        </div>



        <!--iklan2-->

        <style>
            .iklan3 {
                width: 90%;
                margin-right: auto;
                margin-left: auto;
                margin-top: 40px;
            }

            .iklan4 {
                width: 90%;
                margin-right: auto;
                margin-left: auto;
                border-radius: 10px;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            }
        </style>

        <div class="iklan3">
            <p style="font-size: 4vw;font-weight: bold;">
                Kirim untuk Terkasih!
            </p>
        </div>

        <div class="iklan4">
            <a href="#">
                <!--Masukan Link pada bagian href-->
                <img src="https://i.ibb.co/F3MWJ1x/Desain-tanpa-judul-2022-10-11-T145044-734.png" style="width: 100%;border-radius: 10px;">
                <!--Ganti Banner pada bagian src-->
            </a>
        </div>






        <!--Footer-->

        <style>
            .footer1 {
                width: 100%;
                height: 60px;
                background-color: #FF6263;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                position: fixed;
                bottom: 0px;
                border-top-right-radius: 10px;
                border-top-left-radius: 10px;

            }

            .footer2 {
                width: 100%;
                height: 70px;
            }
        </style>









        <div class="footer2"></div>































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