@extends ('layouts.theme.front')

@section ('title')
Kategori Produk
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
<!-- ...:::Start Catagories - 1 Section:::... -->
<div class="catagories-section section-gap-top-50">
    <div class="container">

        <div class="title-content">
            <h2 class="title">All Product {{ $category->name }}</h2>
            <button aria-label="Short by" class="short-btn">Short by <span class="icon"><i class="icon icon-carce-arrow_drop_down_circle"></i></span></button>
        </div>
        <div class="product-wrapper">
            <div class="product-wrapper-content--4">
                <!-- Start Product Single Item -->
                @foreach ( $category->product as $product )
                <div id="single-product-item" class="single-product-item product-item--style-4">
                    <a aria-label="Product Image" href="{{ url ('product/'.$product->id) }}" class="image">
                        <img width="90" height="90" class="img-fluid" src="{{ asset('storage/uploads/product_images/' .  $product->product_image) }}" alt="{{ $product->name }}">
                    </a>
                    <div class="content">
                        <div class="content--left">
                            <a href="{{ url ('product/'.$product->id) }}" class="title">{{ $product->name }}</a>
                            <ul class="review-star">
                                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                            </ul>
                            <span class="price">@rupiah ($product->price)</span>
                        </div>
                        <div class="content--right">
                            <a href="wishlist.html" aria-label="Wishlist" class="btn btn--size-33-33 btn--center btn--round btn--color-radical-red btn--bg-white btn--box-shadow"><i class="icon icon-carce-heart"></i></a>
                        </div>
                    </div>
                    <a href="cart.html" aria-label="Cart" class="cart-link"><i class="icon icon-carce-cart"></i></a>
                </div>
                @endforeach
                <!-- ENd Product Single Item -->
            </div>
            <button class="load-more-btn">load more</button>
        </div>
    </div>
</div>
<!-- ...:::Start Catagories - 1 Section:::... -->

<div class="short-section">
    <div class="container">
        <div class="short-wrapper">
            <span class="title">Short By</span>

            <ul class="short-select-list">
                <li class="list-item">
                    <label for="sort-1">
                        Recent
                        <input type="radio" name="sort-item" id="sort-1" checked>
                        <span class="sort-radio-btn"></span>
                    </label>
                </li>
                <li class="list-item">
                    <label for="sort-2">
                        Most expensive
                        <input type="radio" name="sort-item" id="sort-2">
                        <span class="sort-radio-btn"></span>
                    </label>
                </li>
                <li class="list-item">
                    <label for="sort-3">
                        Cheapest
                        <input type="radio" name="sort-item" id="sort-3">
                        <span class="sort-radio-btn"></span>
                    </label>
                </li>
                <li class="list-item">
                    <label for="sort-4">
                        Recomended
                        <input type="radio" name="sort-item" id="sort-4">
                        <span class="sort-radio-btn"></span>
                    </label>
                </li>
            </ul>

            <div class="short-btn-group">
                <button class="btn btn-cancel">Cancel</button>
                <button class="btn btn-apply">Apply</button>
            </div>
        </div>
    </div>
</div>

@endsection