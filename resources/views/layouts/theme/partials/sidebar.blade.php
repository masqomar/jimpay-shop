<!-- Start Offcanvas Mobile Menu Wrapper -->
<div class="offcanvas-mobile-menu-wrapper">
    <!-- Start Mobile Menu  -->
    <div class="mobile-menu-bottom">
        <!-- Start Mobile Menu Nav -->
        <div class="offcanvas-menu">
            <ul>
                @guest
                @if (Route::has('login'))
                <li>
                    <a href="{{url('/')}}"><span>Home</span></a>
                </li>
                @endif

                @else
                @if (auth()->user()->level === 'Admin')
                <li>
                    <a href="{{url('/dashboard')}}"><span>Home</span></a>
                </li>
                @endif

                @if (auth()->user()->level !== 'Admin')
                <li>
                    <a href="{{url('/member/dashboard')}}"><span>Home</span></a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span>Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endif
                @endguest
                <li>
                    <a href="#"><span>Shop</span></a>
                    <ul class="mobile-sub-menu">
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="single-product.html">Product</a></li>
                        <li><a href="shop-category.html">Shop Category</a></li>
                    </ul>

                </li>
                <li>
                    <a href="#"><span>Pages</span></a>
                    <ul class="mobile-sub-menu">
                        <li><a href="chat.html">Chat</a></li>
                        <li><a href="cart">Cart</a></li>
                        <li><a href="wishlist.html">Wishlist</a></li>
                        <li><a href="order.html">Order</a></li>
                        <li><a href="{{url ('login')}}">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                    </ul>
                </li>
            </ul>
        </div> <!-- End Mobile Menu Nav -->
    </div> <!-- End Mobile Menu -->

    <!-- Start Mobile contact Info -->
    <div class="mobile-contact-info">
        <address class="address">
            <span>Address: 4710-4890 Breckinridge St, Fayettevill</span>
            <span>Call Us: (+800) 345 678, (+800) 123 456</span>
            <span>Email: yourmail@mail.com</span>
        </address>
    </div>
    <!-- End Mobile contact Info -->

</div> <!-- End Offcanvas Mobile Menu Wrapper -->