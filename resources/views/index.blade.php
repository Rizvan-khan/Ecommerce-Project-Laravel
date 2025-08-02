@extends('themelayout.app')


@section('content')




    <!--============================
        FLASH SELL 2 START
    ==============================-->
    <section class="flash_sell_2 flash_sell mt_95">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-md-3 col-xl-4">
                    <div class="section_heading_2 section_heading">
                        <h3><span>Flash</span> Sell</h3>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-9 col-xl-8">
                    <div class="d-flex flex-wrap justify-content-end">
                        <div class="simply-countdown simply-countdown-one"></div>
                        <div class="view_all_btn_area">
                            <a class="view_all_btn" href="flash_deals.html">View all</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt_25 flash_sell_2_slider">

@foreach($products as $product)

                <div class="col-xl-1-5 wow fadeInUp">
                    <div class="product_item_2 product_item">
                        <div class="product_img">

                            <img class="img-fluid w-100" src="{{ asset('uploads/singleProduct' . $product->image) }}" alt="Dress">

                            <ul class="discount_list">
                                <li class="discount"> <b>-</b> 75%</li>
                                <li class="new"> new</li>
                            </ul>
                            <ul class="btn_list">
 
                                @if($product->images->first())
                                   <li>
                                    <a href="#">
                                    <img src="{{ asset('uploads/singleProduct' . $product->images->first()->filename) }}" width="150">
                                 </li>
                                    @endif

                              
                              
                               
                            </ul>
                        </div>
                        <div class="product_text">
                            <a class="title" href="{{ route('product-detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                            <p class="price">{{ $product->dp_price }} <del>{{ $product->price }}</del></p>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span>(20 reviews)</span>
                            </p>
                            <ul class="color">

                                 @foreach($product->colors as $color)
                                  <li class="" style="background:#DB4437">
                    <span style="display:inline-block;width:20px;height:20px;background:{{ $color->color_code }};"></span>
                  </li>
                    @endforeach

                             
                               
                            </ul>
                        </div>
                    </div>
                </div>

                @endforeach
               
            </div>
        </div>
    </section>
    <!--============================
        FLASH SELL 2 END
    ==============================-->


    <!--============================
        CATEGORY 2 START
    ==============================-->
    <section class="category category_2 mt_55">
        <div class="container">
            <div class="row category_2_slider">
                <div class="col-2 wow fadeInUp">
                    <a href="shop.html" class="category_item">
                        <div class="img">
                            <img src="assets/images/category_img_2.png" alt="Category" class="img-fluid w-100">
                        </div>
                        <h3> Men's Fashion</h3>
                    </a>
                </div>
               
              
            </div>
        </div>
    </section>
    <!--============================
        CATEGORY 2 END
    ==============================-->


    


@endsection