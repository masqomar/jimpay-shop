@extends ('layouts.theme.front')

@section ('title')
JIMMart
@endsection

@section ('cart')
<ul class="list-child">
    @guest
    @if (Route::has('login'))
    <li class="list-item">
        <span class="notch-bg notch-bg--sunset-orange">0</span>
        <a href="{{route('cart')}}" area-label="Cart" class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow"><i class="icon icon-carce-cart"></i></a>
    </li>
    @endif

    @else
    <li class="list-item">
        @foreach ($carts as $cart)
        @if ($cart->user_id === auth()->user()->id)
        <span class="notch-bg notch-bg--sunset-orange">{{$cart->total}}</span>
        <a href="{{route('cart')}}" area-label="Cart" class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow"><i class="icon icon-carce-cart"></i></a>
        @endif
        @endforeach
    </li>
    @endguest
</ul>
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

<!-- ...:::Start Catagories - 1 Section:::... -->
<div class="catagories-section section-gap-top-50">
    <div class="container">
        <div class="catagories-area">
            <div class="catagories-nav-1">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($categories as $category)
                        <div class="swiper-slide">
                            <a href="{{ url ('category/'.$category->id) }}" class="btn"><span class="icon"><img width="33" height="33" src="{{ asset('storage/uploads/icons/' . $category->icon) }}" alt="{{ $category->name }}"></span> {{ $category->name }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="title-content">
            <h2 class="title">Popular</h2>
            <a href="shop.html" class="view-all">View All</a>
        </div>
        <div class="catagories-wrapper">
            <div class="catagories-wrapper-content">
                <!-- Start Product Single Item -->
                @foreach ($products as $product)
                <div class="single-product-item product-item--style-1 product-item--bg-lime-green">
                    <a href="{{ url ('product/'.$product->id) }}" class="image">
                        <img width="127" height="98" class="img-fluid" src="{{ asset('storage/uploads/product_images/' . $product->product_image) }}" alt="image">
                    </a>
                    <div class="content">
                        <div class="content--left">
                            <ul class="review-star">
                                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                            </ul>
                            <a href="{{ url ('product/'.$product->id) }}" class="title">{{ $product->name }}</a>
                            <span class="price">@rupiah ($product->price)</span>
                        </div>
                        <div class="content--right">
                            <a href="wishlist.html" aria-label="Wishlist" class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow"><i class="icon icon-carce-heart"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- ENd Product Single Item -->
            </div>
        </div>

    </div>
</div>
<!-- ...:::Start Catagories - 1 Section:::... -->
@endsection