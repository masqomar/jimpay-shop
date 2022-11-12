@extends ('layouts.theme.front')

@section ('title')
Dashboard
@endsection

@section ('content')
<!-- ...:::Start Hero Slider Section:::... -->
<div class="hero-section section-gap-top-25">
    <div class="container">
        <!-- Start Hero Area -->
        <div class="hero-area hero-area--style-1 hero-slider-active">
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="hero-singel-slide ">
                            <div class="hero-bg">
                                <img width="388" height="160" class="img-full" src="{{asset('assets')}}/images/hero/bg/hero-bg-1.jpg" alt="image">
                            </div>
                            <div class="inner-wrapper">
                                <div class="content">
                                    <p class="title-tag">Summer</p>
                                    <h1 class="title">Fashion</h1>
                                    <h2 class="sub-title">SALE</h2>
                                    <h3 class="sub-title">UP to <span>70% </span> off</h3>
                                </div>
                                <div class="product-img">
                                    <img width="149" height="127" class="img-fluid" class="img-fluid" src="{{asset('assets')}}/images/hero/product/product-1.png" alt="image">
                                    <div class="shape shape-1"><img width="83" height="83" class="img-fluid" src="{{asset('assets')}}/images/hero/shape/shape-dotted.png" alt="image"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="hero-singel-slide">
                            <div class="hero-bg">
                                <img width="388" height="160" class="img-full" src="{{asset('assets')}}/images/hero/bg/hero-bg-1.jpg" alt="image">
                            </div>
                            <div class="inner-wrapper">
                                <div class="content">
                                    <p class="title-tag">Summer</p>
                                    <h1 class="title">Fashion</h1>
                                    <h2 class="sub-title">SALE</h2>
                                    <h3 class="sub-title">UP to <span>70% </span> off</h3>
                                </div>
                                <div class="product-img">
                                    <img width="127" height="98" class="img-fluid" class="img-fluid" src="{{asset('assets')}}/images/hero/product/product-2.png" alt="image">
                                    <div class="shape shape-1"><img width="83" height="83" class="img-fluid" src="{{asset('assets')}}/images/hero/shape/shape-dotted.png" alt="image"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="hero-singel-slide">
                            <div class="hero-bg">
                                <img width="388" height="160" class="img-full" src="{{asset('assets')}}/images/hero/bg/hero-bg-1.jpg" alt="image">
                            </div>
                            <div class="inner-wrapper">
                                <div class="content">
                                    <p class="title-tag">Summer</p>
                                    <h1 class="title">Fashion</h1>
                                    <h2 class="sub-title">SALE</h2>
                                    <h3 class="sub-title">UP to <span>70% </span> off</h3>
                                </div>
                                <div class="product-img">
                                    <img width="126" height="98" class="img-fluid" class="img-fluid" src="{{asset('assets')}}/images/hero/product/product-3.png" alt="image">
                                    <div class="shape shape-1"><img width="83" height="83" class="img-fluid" src="{{asset('assets')}}/images/hero/shape/shape-dotted.png" alt="image"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <!-- End Hero Area -->
    </div>
</div>
<!-- ...:::End Hero Slider Section:::... -->
<br>
<!--Money-->
<style>
    .money1 {
        width: 100%;
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

<div class="container">
    <div class="money1">
        <div class="money2">
            <div class="money3" style="margin-top: 8px;">
                <a type="text" style="font-size: 14px;font-weight: bold;position: relative;top: 8px;left: 10px;">
                    Saldo Anda
                    <p>
                        @rupiah (auth()->user()->balance)
                    </p>
                </a>
            </div>
        </div>

        <div class="money2" style="width: 15%;text-align: center;">
            <a href="{{route('member.topup')}}" type="text" style="position: relative;top: 15px;text-decoration: none;">
                <img src="{{asset('assets')}}/images/icons/topup.png" style="width: 25px;height: 25px;">
                <p style="font-size: 12px;font-weight: bold;color: white;">
                    Top Up
                </p>
            </a>
        </div>

        <div class="money2" style="width: 15%;text-align: center;">
            <a href="#" type="text" style="position: relative;top: 15px;text-decoration: none;">
                <img src="{{asset('assets')}}/images/icons/scan.png" style="width: 25px;height: 25px;">
                <p style="font-size: 12px;font-weight: bold;color: white;">
                    Bayar
                </p>
            </a>
        </div>

        <div class="money2" style="width: 15%;text-align: center;">
            <a href="#" type="text" style="position: relative;top: 15px;text-decoration: none;">
                <img src="{{asset('assets')}}/images/icons/tf.png" style="width: 25px;height: 25px;">
                <p style="font-size: 12px;font-weight: bold;color: white;">
                    Transfer
                </p>
            </a>
        </div>
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
        <div class="row row-cols-6">
            <div class="col">
                <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='{{route('member.sim-wajib')}}'">
                    <!--Masukan Link pada bagian href-->
                    <img src="{{asset('assets')}}/images/icons/sim-wajib.png" style="width: 100%;background-color: red" class="rounded-circle">
                    <!--Ganti Icon pada bagian src-->
                    <p style="font-size: 0.7vw,">
                        All Menu
                    </p>
                </button>
            </div>

            <div class="col">
                <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='{{route('member.sim-sukarela.index')}}'">
                    <!--Masukan Link pada bagian href-->
                    <img src="{{asset('assets')}}/images/icons/scan.png" style="width: 100%;background-color: red" class="rounded-circle">
                    <!--Ganti Icon pada bagian src-->
                    <p style="font-size: 0.7vw,">
                        Sim Wajib
                    </p>
                </button>
            </div>

            <div class="col">
                <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='{{route('member.sim-wajib')}}'">
                    <!--Masukan Link pada bagian href-->
                    <img src="{{asset('assets')}}/images/icons/sim-wajib.png" style="width: 100%;background-color: red" class="rounded-circle">
                    <!--Ganti Icon pada bagian src-->
                    <p style="font-size: 0.7vw,">
                        Sim Sukarela
                    </p>
                </button>
            </div>

            <div class="col">
                <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='{{route('member.sim-wajib')}}'">
                    <!--Masukan Link pada bagian href-->
                    <img src="{{asset('assets')}}/images/icons/sim-wajib.png" style="width: 100%;background-color: red" class="rounded-circle">
                    <!--Ganti Icon pada bagian src-->
                    <p style="font-size: 0.7vw,">
                        Sim Wajib
                    </p>
                </button>
            </div>

            <div class="col">
                <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='{{route('member.sim-wajib')}}'">
                    <!--Masukan Link pada bagian href-->
                    <img src="{{asset('assets')}}/images/icons/sim-wajib.png" style="width: 100%;background-color: red" class="rounded-circle">
                    <!--Ganti Icon pada bagian src-->
                    <p style="font-size: 0.7vw,">
                        Sim Wajib
                    </p>
                </button>
            </div>

            <div class="col">
                <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='{{route('member.sim-wajib')}}'">
                    <!--Masukan Link pada bagian href-->
                    <img src="{{asset('assets')}}/images/icons/sim-wajib.png" style="width: 100%;background-color: red" class="rounded-circle">
                    <!--Ganti Icon pada bagian src-->
                    <p style="font-size: 0.7vw,">
                        Sim Wajib
                    </p>
                </button>
            </div>

            <div class="col">
                <button style="width: 100%;border-style: none;background-color: transparent;" onclick="window.location.href='{{route('member.sim-wajib')}}'">
                    <!--Masukan Link pada bagian href-->
                    <img src="{{asset('assets')}}/images/icons/sim-wajib.png" style="width: 100%;background-color: red" class="rounded-circle">
                    <!--Ganti Icon pada bagian src-->
                    <p style="font-size: 0.7vw,">
                        Sim Wajib
                    </p>
                </button>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="title-content">
        <h2 class="title">Hot News</h2>
        <a href="shop.html" class="view-all">View All</a>
    </div>
</div>
<div class="container">
    <div class="catagories-wrapper">
        <div class="catagories-wrapper-content">
            <div class="single-product-item product-item--style-1 product-item--bg-red-orange">
                <a href="" class="image">
                    <img width="127" height="98" class="img-fluid" src="https://i.ibb.co/zbt8ng3/Desain-tanpa-judul-2022-10-11-T144332-655.png" alt="image">
                </a>
                <div class="content">
                    <div class="content--left">
                        <a href="">
                            <h2 class="title">Hot News</h2>
                        </a>
                        <p>ssd</p>
                    </div>
                </div>
            </div>
            <div class="single-product-item product-item--style-1 product-item--bg-red-orange">
                <a href="" class="image">
                    <img width="127" height="98" class="img-fluid" src="https://i.ibb.co/zbt8ng3/Desain-tanpa-judul-2022-10-11-T144332-655.png" alt="image">
                </a>
                <div class="content">
                    <div class="content--left">
                        <a href="">
                            <h2 class="title">Hot News</h2>
                        </a>
                        <p>ssd</p>
                    </div>
                </div>
            </div>
            <div class="single-product-item product-item--style-1 product-item--bg-red-orange">
                <a href="" class="image">
                    <img width="127" height="98" class="img-fluid" src="https://i.ibb.co/zbt8ng3/Desain-tanpa-judul-2022-10-11-T144332-655.png" alt="image">
                </a>
                <div class="content">
                    <div class="content--left">
                        <a href="">
                            <h2 class="title">Hot News</h2>
                        </a>
                        <p>ssd</p>
                    </div>
                </div>
            </div>
            <div class="single-product-item product-item--style-1 product-item--bg-red-orange">
                <a href="" class="image">
                    <img width="127" height="98" class="img-fluid" src="https://i.ibb.co/zbt8ng3/Desain-tanpa-judul-2022-10-11-T144332-655.png" alt="image">
                </a>
                <div class="content">
                    <div class="content--left">
                        <a href="">
                            <h2 class="title">Hot News</h2>
                        </a>
                        <p>ssd</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection