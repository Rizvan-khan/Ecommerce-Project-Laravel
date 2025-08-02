<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html.narzotech.com/zenis/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Jul 2025 16:59:35 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>Ecommerce Application</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/mobile_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/scroll_button.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/jquery.pwstabs.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/range_slider.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/multiple-image-video.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/animated_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/custom_spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/responsive.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="default_home">


    <!--=========================
        MENU 2 START
    ==========================-->
    <nav class="main_menu_2 main_menu d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <div class="main_menu_area">
                        <div class="menu_category_area">
                            <a href="index.html" class="menu_logo d-none">
                                <img src="assets/images/logo_2.png" alt="Zenis" class="img-fluid w-100">
                            </a>
                            <div class="menu_category_bar">
                                <p>
                                    <span>
                                        <img src="assets/images/bar_icon_white.svg" alt="category icon">
                                    </span>
                                    Browse Categories


                                </p>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <ul class="menu_cat_item">
                                <li>
                                    <a href="shop.html">
                                        <span>
                                            <img src="assets/images/category_list_icon_1.png" alt="category">
                                        </span>
                                        Men’s Fashion
                                    </a>
                                    <ul class="menu_cat_droapdown">
                                        <li><a href="shop.html">shirts <i class="fal fa-angle-right"></i></a>
                                            <ul class="sub_category">
                                                <li><a href="shop.html">Casual Shirts</a> </li>
                                                <li><a href="shop.html">Formal Shirts</a></li>
                                                <li><a href="shop.html">Denim Shirts</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">pant <i class="fal fa-angle-right"></i></a>
                                            <ul class="sub_category">
                                                <li><a href="shop.html">Casual Pants</a></li>
                                                <li><a href="shop.html">Formal Trousers</a> </li>
                                                <li><a href="shop.html">Jeans & Denim</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Casual Wear</a></li>
                                        <li><a href="shop.html">Formal Attire</a></li>
                                    </ul>
                                </li>

                                <li class="all_category">
                                    <a href="category.html">View All Categories <i class="far fa-arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                        <ul class="menu_item">
                            <li>
                                <a class="active" href="#">home <i class="fas fa-chevron-down"></i></a>

                            </li>



                            <li><a href="contact_us.html">contact</a></li>
                        </ul>
                        <ul class="menu_icon">
                           
                            <li>
                                <a href="wishlist.html">
                                    <b>
                                        <img src="{{asset('theme/assets/images/love_black.svg')}}" alt="Wishlist" class="img-fluid">
                                    </b>
                                     <span id="wish-count">0</span>
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                    aria-controls="offcanvasRight">
                                    <b>
                                        <img src="{{asset('theme/assets/images/cart_black.svg')}}" alt="cart" class="img-fluid">
                                    </b>
                                     <span id="cart-count">0</span>
                                    <!-- <span>3</span> -->
                                </a>
                            </li>
                            <li>
                                <a class="user" href="dashboard.html">
                                    <b>
                                        <img src="{{asset('theme/assets/images/user_icon_black.svg')}}" alt="cart" class="img-fluid">
                                    </b>
                                    <h5> Smith Jhon</h5>
                                </a>
                                <ul class="user_dropdown">
                                    <li>
                                        <a href="dashboard.html">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                            </svg>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard_profile.html">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                            </svg>
                                            my account
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard_order.html">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                            </svg>
                                            my order
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard_wishlist.html">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                            </svg>
                                            wishlist
                                        </a>
                                    </li>
                                    <li>
                                        @if(auth()->check())
                                        {{-- ✅ Show logout if user is logged in --}}
                                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 border-0 bg-transparent text-danger d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6 me-1" style="width: 20px; height: 20px;">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                                </svg>
                                                Logout
                                            </button>
                                        </form>
                                        @else
                                        {{-- ✅ Show login if user is NOT logged in --}}
                                        <a href="{{ route('login') }}" class="text-primary d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6 me-1" style="width: 20px; height: 20px;">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6A2.25 2.25 0 0 0 5.25 5.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                            </svg>
                                            Login
                                        </a>
                                        @endif

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="mini_cart">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel"> my cart <span class="my-cart-count">(0)</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                        class="far fa-times"></i></button>
            </div>
            <div class="offcanvas-body">
                
                <ul id="cart-item-list" class="your-cart-ul-class">
                    <!-- <li>
                        <a href="shop_details.html" class="cart_img">
                            <img src="assets/images/product_1.png" alt="product" class="img-fluid w-100">
                        </a>
                        <div class="cart_text">
                            <a class="cart_title" href="shop_details.html">Men's Fashionable Hoodie</a>
                            <p>$140 <del>$150</del></p>
                            <span><b>Color:</b> Red</span>
                            <span><b>Size:</b> XL (Extra Large)</span>
                        </div>
                        <a class="del_icon" href="#"><i class="fal fa-times"></i></a>
                    </li> -->
                   
                </ul>
                <h5>sub total <span id="cart-subtotal">$0.00</span></h5>
                <div class="minicart_btn_area">
                    <a class="common_btn" href="view-cart">view cart</a>
                </div>
            </div>
        </div>
    </div>
    <!--=========================
        MENU 2 END
    ==========================-->


    <!--============================
        MOBILE MENU START
    ==============================-->
    <div class="mobile_menu_area">
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="fal fa-times"></i></button>
            <div class="offcanvas-body">

                <ul class="mobile_currency">
                    <li>
                        <select class="select_js language">
                            <option>English</option>
                            <option>Arabic</option>
                            <option>Hindi</option>
                            <option>Chinese</option>
                        </select>
                    </li>
                    <li>
                        <select class="select_js">
                            <option>$USD</option>
                            <option>€EUR</option>
                            <option>¥JPY</option>
                            <option>£GBP</option>
                            <option>₹INR</option>
                        </select>
                    </li>
                </ul>

                <ul class="mobile_menu_header d-flex flex-wrap">
                    <li>
                        <a href="compare.html">
                            <b> <img src="assets/images/compare_black.svg" alt="Wishlist" class="img-fluid"> </b>
                            <span>2</span>
                        </a>
                    </li>
                    <li>
                        <a href="wishlist.html">
                            <b> <img src="assets/images/love_black.svg" alt="Wishlist" class="img-fluid"></b>
                            <span>4</span>
                        </a>
                    </li>
                    <li>
                        <a href="cart.html">
                            <b><img src="assets/images/cart_black.svg" alt="cart" class="img-fluid"></b>
                            <span>5</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.html">
                            <b><img src="assets/images/user_icon_black.svg" alt="cart" class="img-fluid"></b>
                        </a>
                    </li>
                </ul>

                <form class="mobile_menu_search">
                    <input type="text" placeholder="Search">
                    <button type="submit"><i class="far fa-search"></i></button>
                </form>

                <div class="mobile_menu_item_area">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Categories</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">menu</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <ul class="main_mobile_menu">
                                <li class="mobile_dropdown">
                                    <a href="#">Men's Fashion</a>
                                    <ul class="inner_menu">
                                        <li><a href="shop.html">jeans pant</a></li>
                                        <li><a href="shop.html">formal shirt</a></li>
                                        <li><a href="shop.html">2 quater</a></li>
                                        <li><a href="shop.html">denim jacket</a></li>
                                        <li><a href="shop.html">t-shirt</a></li>
                                        <li><a href="shop.html">polo-shirt</a></li>
                                        <li><a href="shop.html">formal pant</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">women's Fashion</a>
                                    <ul class="inner_menu">
                                        <li><a href="shop.html">sharee</a></li>
                                        <li><a href="shop.html">kurti</a></li>
                                        <li><a href="shop.html">plazoo</a></li>
                                        <li><a href="shop.html">lagins</a></li>
                                        <li><a href="shop.html">tops</a></li>
                                        <li><a href="shop.html">scart</a></li>
                                        <li><a href="shop.html">denim jeans</a></li>
                                        <li><a href="shop.html">Gown</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">kids fashion</a>
                                    <ul class="inner_menu">
                                        <li><a href="shop.html">t-shirt</a></li>
                                        <li><a href="shop.html">partu dress</a></li>
                                        <li><a href="shop.html">sharee</a></li>
                                        <li><a href="shop.html">kurti</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">western wear</a>
                                    <ul class="inner_menu">
                                        <li><a href="shop.html">western party dress</a></li>
                                        <li><a href="shop.html">kurti</a></li>
                                        <li><a href="shop.html">denim pant</a></li>
                                        <li><a href="shop.html">casual jacket</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">Denim collection</a>
                                    <ul class="inner_menu">
                                        <li><a href="shop.html">shirt</a></li>
                                        <li><a href="shop.html">pant</a></li>
                                        <li><a href="shop.html">jacket</a></li>
                                        <li><a href="shop.html">blazer</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">sport wear</a>
                                    <ul class="inner_menu">
                                        <li><a href="shop.html">shoes</a></li>
                                        <li><a href="shop.html">trouser</a></li>
                                        <li><a href="shop.html">meat</a></li>
                                        <li><a href="shop.html">Outdoors</a></li>
                                        <li><a href="shop.html">Sports Pant</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">beauty products</a>
                                    <ul class="inner_menu">
                                        <li><a href="shop.html">Concealer Palette</a></li>
                                        <li><a href="shop.html">Highlighter Palette</a></li>
                                        <li><a href="shop.html">SkinPure Avocado Gel</a></li>
                                        <li><a href="shop.html">Blush Palette</a></li>
                                        <li><a href="shop.html">Face Wash</a></li>
                                        <li><a href="shop.html">Lip Balm</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">fashion jewellery</a>
                                    <ul class="inner_menu">
                                        <li><a href="shop.html">Necklace</a></li>
                                        <li><a href="shop.html">ear ring</a></li>
                                        <li><a href="shop.html">fingure ring</a></li>
                                        <li><a href="shop.html">bratchlet</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <ul class="main_mobile_menu">
                                <li class="mobile_dropdown">
                                    <a href="#">home</a>
                                    <ul class="inner_menu">
                                        <li><a href="index.html">clothing fashion 01</a></li>
                                        <li><a href="home_fashion_2.html">clothing fashion 02</a></li>
                                        <li><a href="home_grocery.html">Grocery Store</a></li>
                                        <li><a href="home_beauty.html">Beauty & Cosmetics</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">shop</a>
                                    <ul class="inner_menu">
                                        <li><a href="#">store</a></li>
                                        <li><a href="#">store details</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">store</a>
                                    <ul class="inner_menu">
                                        <li><a href="vendor.html">store</a></li>
                                        <li><a href="vendor_details.html">store details</a></li>
                                        <li><a href="vendor_registration.html">become a vendor</a></li>
                                    </ul>
                                </li>
                                <li><a href="flash_deals.html">flash deals</a></li>
                                <li class="mobile_dropdown">
                                    <a href="#">pages</a>
                                    <ul class="inner_menu">
                                        <li><a href="about_us.html">about us</a></li>
                                        <li><a href="category.html">Category</a></li>
                                        <li><a href="brand.html">Brand</a></li>
                                        <li><a href="cart.html">cart view</a></li>
                                        <li><a href="wishlist.html">wishlist</a></li>
                                        <li><a href="compare.html">compare</a></li>
                                        <li><a href="checkout.html">checkout</a></li>
                                        <li><a href="payment_success.html">payment success</a></li>
                                        <li><a href="payment_cancel.html">payment Cancel</a></li>
                                        <li><a href="track_order.html">track order</a></li>
                                        <li><a href="error.html">error/404</a></li>
                                        <li><a href="faq.html">FAQ's</a></li>
                                        <li><a href="privacy_policy.html">privacy Policy</a></li>
                                        <li><a href="terms_condition.html">terms and condition</a></li>
                                        <li><a href="return_policy.html">return policy</a></li>
                                        <li><a href="sign_in.html">sign in</a></li>
                                        <li><a href="sign_up.html">sign up</a></li>
                                        <li><a href="forgot_password.html">forgot password</a></li>
                                        <li><a href="dashboard.html">Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="mobile_dropdown">
                                    <a href="#">blog</a>
                                    <ul class="inner_menu">
                                        <li><a href="blog_classic.html">blog classic</a></li>
                                        <li><a href="blog_left_sidebar.html">blog right sidebar</a></li>
                                        <li><a href="blog_left_sidebar.html">blog left sidebar</a></li>
                                        <li><a href="blog_details.html">blog details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact_us.html">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================
        MOBILE MENU END
    ==============================-->