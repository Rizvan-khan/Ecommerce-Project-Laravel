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
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
            </div>
        </td>
        <td class="cart_page_img">
            <div class="img">
                <img src="{{ asset('uploads/singleProduct/' . ($item->product->image ?? 'default.jpg')) }}" alt="Product" class="img-fluid w-100">
            </div>
        </td>
        <td class="cart_page_details">
            <a class="title" href="#">{{ $item->product->name ?? 'Product not found' }}</a>
            <p>₹{{ $item->product->dp_price ?? 0 }} <del>₹{{ $item->product->price ?? 0 }}</del></p>
            <span><b>Color:</b> {{ $item->product->color ?? 'N/A' }}</span>
            <span><b>Size:</b> {{ $item->product->size ?? 'N/A' }}</span>
        </td>
        <td class="cart_page_price">
            <h3>₹{{ $item->product->dp_price ?? 0 }}</h3>
        </td>
        <td class="cart_page_quantity">
            <div class="details_qty_input">
                <button class="minus"><i class="fal fa-minus" aria-hidden="true"></i></button>
                <input type="text" value="1">
                <button class="plus"><i class="fal fa-plus" aria-hidden="true"></i></button>
            </div>
        </td>
        <td class="cart_page_total">
            <h3>₹{{ $item->product->dp_price ?? 0 }}</h3>
        </td>
        <td class="cart_page_action">
            @if(isset($item->id))
                <a href="javascript:void(0);" onclick="removeCartItem('{{ $item->id }}', this)">
                    <i class="fal fa-times"></i> Remove
                </a>
            @else
                <span>Invalid item</span>
            @endif
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7">Your cart is empty.</td>
    </tr>
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

                       
                        <ul>

@forelse($cartItems as $item)
    @if(isset($item->product))
        <li>
            <a class="img" href="#">
                <img src="{{ asset('uploads/singleProduct/' . $item->product->image) }}" alt="Product" class="img-fluid w-100">
            </a>
            <div class="text">
                <a class="title" href="#">{{ $item->product->name ?? 'Product not found' }}</a>
                <p>₹{{ $item->product->dp_price ?? $item->product->price ?? 0 }}</p>
                <p>Color: {{ $item->product->color ?? 'N/A' }}, Size: {{ $item->product->size ?? 'N/A' }}</p>
            </div>
        </li>
    @else
        <li><p>Product not found</p></li>
    @endif
@empty
    <p>No Product Into Your Cart.</p>
@endforelse

                        
                        </ul>
                       

                        <h6>Subtotal <span>${{ number_format($subtotal, 2) }}</span></h6>
@if($discount > 0)
<h6>Discount ({{ $discountPercent }}%) <span>(-) ${{ number_format($discount, 2) }}</span></h6>
@endif
<h6>Tax (5%) <span>(+) ${{ number_format($tax, 2) }}</span></h6>
<h4>Total <span>${{ number_format($total, 2) }}</span></h4>



                        <form id="applyCouponForm">
                            @csrf
                            <input type="text" name="coupon_code" placeholder="Coupon code">
                            <button type="submit" class="common_btn">Apply</button>
                        </form>

                        <p>Coupon Code : HEM4556JL</p>

                        <p id="couponMessage"></p>

                    </div>
                    <div class="cart_summary_btn">
                        <a class="common_btn continue_shopping" href="shop.html">Contiue shopping</a>
                      <a class="common_btn" href="{{ route('checkout') }}">Checkout <i class="fas fa-long-arrow-right"></i></a>

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