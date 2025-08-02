@extends('themelayout.app')

@section('content')

<section class="page_banner" style="background: url(assets/images/page_banner_bg.jpg);">
    <div class="page_banner_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page_banner_text wow fadeInUp">
                        <h1>Cart View</h1>
                        <ul>
                            <li><a href="index"><i class="fal fa-home-lg"></i> Home</a></li>
                            <li><a href="view-cart">Cart View</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========================
        PAGE BANNER START
    ==========================-->


<!--============================
        CART PAGE START
    =============================-->
<section class="cart_page mt_100 mb_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 wow fadeInUp">
                <div class="cart_table_area">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart_page_checkbox">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                        </div>
                                    </th>
                                    <th class="cart_page_img">Product image </th>
                                    <th class="cart_page_details">Product Details</th>
                                    <th class="cart_page_price">Unit Price</th>
                                    <th class="cart_page_quantity">Quantity</th>
                                    <th class="cart_page_total">Subtotal</th>
                                    <th class="cart_page_action">action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>

                                @forelse($cartItems as $item)

                                <tr>
                                    <td class="cart_page_checkbox">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault2">
                                        </div>
                                    </td>
                                    <td class="cart_page_img">
                                        <div class="img">

                                            <img src="{{ asset('uploads/singleProduct/' . $item->product->image) }}" alt="Product" class="img-fluid w-100">

                                        </div>
                                    </td>
                                    <td class="cart_page_details">
                                        <a class="title" href="shop_details.html">{{ $item->product->name ?? 'Product not found' }}</a>
                                        <p>₹{{ $item->product->dp_price ?? 0 }} <del>₹{{ $item->product->price ?? 0 }}</del></p>
                                        <span><b>Color:</b> {{ $item->product->color ?? 0 }}</span>
                                        <span><b>Size:</b> {{ $item->product->size ?? 0 }}</span>
                                    </td>
                                    <td class="cart_page_price">
                                        <h3>₹{{ $item->product->dp_price ?? 0 }}</h3>
                                    </td>
                                    <td class="cart_page_quantity">
                                        <div class="details_qty_input">
                                            <button class="minus"><i class="fal fa-minus"
                                                    aria-hidden="true"></i></button>
                                            <input type="text" placeholder="01">
                                            <button class="plus"><i class="fal fa-plus"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                    <td class="cart_page_total">
                                        <h3>₹{{ $item->product->dp_price ?? 0 }}</h3>
                                    </td>
                                    <td class="cart_page_action">

                                        
                                 <a href="javascript:void(0);" onclick="removeCartItem('{{ $item->id }}', this)">
 <i class="fal fa-times"></i> Remove</a>
                                    
                                </td>
                                </tr>
                                @empty
                                <p>Your cart is empty.</p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-9 wow fadeInRight">
                <div id="sticky_sidebar">
                    <div class="cart_page_summary">
                        <h3>Billing summary</h3>

                        <a href="vendor_details.html" class="vendor_name">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                            </svg>
                            Zapier Gallery
                        </a>
                        <ul>
                            <li>
                                <a class="img" href="#">
                                    <img src="assets/images/product_18.png" alt="Products" class="img-fluid w-100">
                                </a>
                                <div class="text">
                                    <a class="title" href="shop_details.html">Full Sleeve Hoodie Jacket</a>
                                    <p>$59.00 × 2</p>
                                    <p>Color: Red, Size: XL</p>
                                </div>
                            </li>
                            <li>
                                <a class="img" href="#">
                                    <img src="assets/images/product_16.png" alt="Products" class="img-fluid w-100">
                                </a>
                                <div class="text">
                                    <a class="title" href="shop_details.html">cherry fabric western tops</a>
                                    <p>$75.00 × 1</p>
                                    <p>Color: Orange, Size: M</p>
                                </div>
                            </li>

                        </ul>
                        <a href="vendor_details.html" class="vendor_name">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                            </svg>
                            Comfort Gallery
                        </a>
                        <ul>
                            <li>
                                <a class="img" href="#">
                                    <img src="assets/images/product_18.png" alt="Products" class="img-fluid w-100">
                                </a>
                                <div class="text">
                                    <a class="title" href="shop_details.html">Full Sleeve Hoodie Jacket</a>
                                    <p>$59.00 × 2</p>
                                    <p>Color: Red, Size: XL</p>
                                </div>
                            </li>
                        </ul>

                        <h6>subtotal <span>$395.00</span></h6>
                        <h6>Tax <span>(+) $100.00</span></h6>
                        <h6>Discount <span>(-) $45.00</span></h6>
                        <h4>Total <span>$410.00</span></h4>

                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit" class="common_btn">Apply</button>
                            <p>
                                Coupon Code: HEM4556JL
                                <a href="#"><i class="fal fa-times"></i></a>
                            </p>
                        </form>
                    </div>
                    <div class="cart_summary_btn">
                        <a class="common_btn continue_shopping" href="shop.html">Contiue shopping</a>
                        <a class="common_btn" href="checkout.html">checkout <i
                                class="fas fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
        CART PAGE END
    =============================-->

@endsection