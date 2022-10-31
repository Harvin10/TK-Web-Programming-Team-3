<header id="header" class="full-header transparent-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">
                <!-- Logo ============================================= -->
                <div id="logo">
                   
                </div>
                <!-- #logo end -->
                <div class="header-misc">
                    @guest
                    <div id="top-account">
                        <a href="{{route('auth')}}">
                            <i class="icon-line2-user me-1 position-relative text-black" style="top: 1px;"></i>
                            <span class="d-none d-sm-inline-block text-black font-primary fw-medium">Login / Register</span>
                        </a>
                    </div>
                    @endguest
                    <!-- Top Search ============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                    </div>
                    <!-- #top-search end -->
                    @auth
                    <!-- Top Cart ============================================= -->
                    @if (Auth::guard('web')->user()->role == "m")
                    <div id="top-cart" onclick="tombol_cart();" class="header-misc-icon d-none d-sm-block">
                        <a href="javascript:;" id="top-cart-trigger"><i class="icon-line-bag"></i><span class="top-cart-number">5</span></a>
                        <div class="top-cart-content">
                            <div class="top-cart-title">
                                <h4>Shopping Cart</h4>
                            </div>
                            <div class="top-cart-items">
                                
                            </div>
                            <div class="top-cart-action">
                                <span class="top-checkout-price"></span>
                                <a href="{{route('checkout')}}" class="button button-3d button-small m-0">Checkout</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- #top-cart end -->
                    <div id="top-account">
                        <div class="dropdown mx-3 me-lg-0">
                            <a href="javascript:;" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="icon-user text-black"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item text-start" href="{{route('profile.index')}}">Profile</a>
                                @if (Auth::guard('web')->user()->role == "m")
                                <a class="dropdown-item text-start" href="{{route('order.index')}}">Transaksi Saya</a>
                                @else
                                <a class="dropdown-item text-start" href="{{route('products.index')}}">Manage Product</a>
                                <a class="dropdown-item text-start" href="{{route('products.category')}}">Manage Category</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-start" href="{{route('logout')}}">Logout <i class="icon-signout"></i></a>
                            </ul>
                        </div>
                    </div>
                    @endauth
                </div>
                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                </div>
                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu">
                    <ul class="menu-container">
                        <li class="menu-item">
                            <a class="menu-link" href="{{route('home')}}"><div>Home</div></a>
                        </li>
                    </ul>
                </nav>
                <!-- #primary-menu end -->
                <form class="top-search-form" id="content_filter">
                    <input type="text" name="keyword" onkeypress="load_list(1);" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>