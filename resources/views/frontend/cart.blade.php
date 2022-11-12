@extends ('layouts.theme.front')

@section ('content')
<!-- ...:::Start Cart Section:::... -->
@foreach ($carts as $cart)
@if ($cart->user_id == auth()->user()->id)
<div class="cart-section section-gap-top-30">
    <div class="container">
        <div class="cart-items-wrapper">
            <ul class="cart-item-list">
                <!-- Start Single Cart Item -->
                <li class="single-cart-item">
                    <div class="image">
                        <img width="90" height="90" src="{{ asset('storage/uploads/product_images/' .  $cart->product->product_image) }}" alt="image">
                    </div>
                    <div class="content">
                        <button class="delete-item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 464c-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216 0 118.7-96.1 216-216 216zm94.8-285.3L281.5 256l69.3 69.3c4.7 4.7 4.7 12.3 0 17l-8.5 8.5c-4.7 4.7-12.3 4.7-17 0L256 281.5l-69.3 69.3c-4.7 4.7-12.3 4.7-17 0l-8.5-8.5c-4.7-4.7-4.7-12.3 0-17l69.3-69.3-69.3-69.3c-4.7-4.7-4.7-12.3 0-17l8.5-8.5c4.7-4.7 12.3-4.7 17 0l69.3 69.3 69.3-69.3c4.7-4.7 12.3-4.7 17 0l8.5 8.5c4.6 4.7 4.6 12.3 0 17z" />
                            </svg>
                        </button>

                        <a href="single-product.html" class="title">{{$cart->product->name}}</a>
                        <div class="details">
                            <div class="left">
                                <span class="text">{{$cart->merchant->name}}</span>
                                <span class="price">{{$cart->quantity}} x @rupiah ($cart->product->price)</span>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- End Single Cart Item -->
            </ul>

            <ul class="cart-info-list">
                <li class="cart-info-single-list">
                    <ul class="cart-info-child">
                        <li class="item"><span class="text-left">Subtotal</span> <span class="text-right">@rupiah($subtotal)</span></li>
                    </ul>
                </li>
                <li class="cart-info-single-list">
                    <ul class="cart-info-child">
                        <li class="item"><span class="text-left">Biaya Layanan</span> <span class="text-right">Rp. 1.000</span></li>
                    </ul>
                </li>
                <li class="cart-info-single-list">
                    <ul class="cart-info-child">
                        <li class="item"><span class="text-left">Grand Total</span> <span class="total-price">@rupiah ($total)</span>
                            <a href="checkout.html" class="btn"><span class="icon"><i class="icon icon-carce-check-circle"></i></span>Check out</a>

                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@endif
@endforeach
<!-- ...:::End Cart Section:::... -->

@endsection