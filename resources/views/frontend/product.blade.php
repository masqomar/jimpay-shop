@extends ('layouts.theme.front')

@section ('title')
Produk
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
<!-- ...:::Start Product Single Section:::... -->
<div class="product-single-section section-gap-top-30">
    <div class="container">
        <div class="product-gallery-image">
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="product-gallery-single-item">
                            <div class="image">
                                <img class="img-fluid" width="276" height="172" src="{{ asset('storage/uploads/product_images/' .  $product->product_image) }}" alt="{{ $product->name }}">
                                <div class="image-shape image-shape-1"></div>
                                <div class="image-shape image-shape-2"></div>
                            </div>
                        </div>
                    </div>
                    @foreach ( $product->product_images as $product_image )
                    <div class="swiper-slide">
                        <div class="product-gallery-single-item">
                            <div class="image">
                                <img class="img-fluid" width="276" height="172" src="{{ asset('storage/uploads/images/' .  $product_image->image) }}" alt="{{ $product->name }}">
                                <div class="image-shape image-shape-1"></div>
                                <div class="image-shape image-shape-2"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
            <div class="product-tag">
                <span class="tag-discount">Free Delivery</span>
                <a href="wishlist.html" aria-label="Wishlist" class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow"><i class="icon icon-carce-heart"></i></a>
            </div>
        </div>

    </div>

    <div class="container px-0">
        <div class="product-gallery-details">
            <span class="rating">Rating 4.0 of 5</span>
            <h1 class="title">{{ $product->name }}</h1>


            <ul class="product-variable-lists">
                <li class="list-item">
                    <div class="left">Seller</div>
                    <div class="right">
                        <h4>
                            <a href="{{ url ('product/'.$product->id) }}" class="title">{{ $product->user->name }}</a>
                        </h4>
                    </div>
                </li>
            </ul>

            @guest
            @if (Route::has('login'))

            <p class="text">
                {{ $product->description }}
            </p>
            <div class="price-n-cart">
                <span class=" price">@rupiah ($product->price)</span>
                <a href="{{ url ('/login') }}" class="btn cart"><span class="icon"><i class="icon icon-carce-cart"></i></span>Add to Cart</a>
            </div>
            @endif
            @else
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                @method('POST')

                <p class="text">
                    {{ $product->description }}
                </p>
                <input type="hidden" value="{{$product->id}}" name="product_id">
                <input type="hidden" value="{{$product->user_id}}" name="merchant_id">
                <ul class="product-variable-lists">
                    <li class="list-item">
                        <div class="left">QTY</div>
                        <div class="right">
                            <div class="product-quantity">
                                <div class="num-block skin-2">
                                    <div class="num-in">
                                        <span class="minus dis"></span>
                                        <label for="quan-1" class="visually-hidden"></label>
                                        <input id="quan-1" type="text" class="in-num" value="1" name="quantity">
                                        <span class="plus"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="price-n-cart">
                    <span class=" price">@rupiah ($product->price)</span>
                    <button class="btn cart"><span class="icon"><i class="icon icon-carce-cart"></i></span>Add to Cart</button>
                </div>
            </form>
            @endguest
        </div>
    </div>
</div>
<!-- ...:::End Product Single Section:::... -->
@endsection