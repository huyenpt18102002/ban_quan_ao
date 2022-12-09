@extends('client.layout.layout')
@section('title', 'Homepage')
@section('body')
         <!--Breadcrumb section-->
         <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="index.html"><i class="fa fa-home"></i>Home</a>
                            <a href="shop.html">Shop</a>
                            <span>Detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!--Breadcrumb section end-->

        <!-- Product Shop Section Begin-->
        <div class="product-shop spad page-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        @include('client.layout.sidebar')
                        {{-- <div class="filter-widget">
                            <h4 class="fw-title">Categories</h4>
                            <ul class="filter-catagories">
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Kids</a></li>
                            </ul>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Brand</h4>
                            <div class="fw-brand-check">
                                <div class="bc-item">
                                    <label for="bc-calvin">
                                        Calvin Klein 
                                        <input type="checkbox" id="bc-calvin">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-diesel">
                                        Diesel 
                                        <input type="checkbox" id="bc-diesel">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-polo">
                                        Polo
                                        <input type="checkbox" id="bc-polo">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-tommy">
                                        Tommy Hifiger
                                        <input type="checkbox" id="bc-tommy">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Price</h4>
                            <div class="filter-range-wrap">
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" name="" id="minamount">
                                        <input type="text" name="" id="maxamount">
                                    </div>
                                </div>
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget-content"
                                data-min="33" data-max="98">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header">
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="filter-btn">Filter</a>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Color</h4>
                            <div class="fw-color-choose">
                                <div class="cs-item">
                                    <input type="radio" name="" id="sc-black">
                                    <label for="cs-black" class="cs-black">black</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="" id="sc-violet">
                                    <label for="cs-violet" class="cs-violet">violet</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="" id="sc-blue">
                                    <label for="cs-blue" class="cs-blue">blue</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="" id="sc-yellow">
                                    <label for="cs-yellow" class="cs-yellow">yellow</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="" id="sc-red">
                                    <label for="cs-red" class="cs-red">red</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="" id="sc-green">
                                    <label for="cs-green" class="cs-green">green</label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Size</h4>
                            <div class="fw-size-choose">
                                <div class="sc-item">
                                    <input type="radio" name="" id="s-size">
                                    <label for="s-size">s</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="" id="m-size">
                                    <label for="m-size">m</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="" id="l-size">
                                    <label for="l-size">l</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="" id="xs-size">
                                    <label for="xs-size">xs</label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Tags</h4>
                            <div class="fw-tags">
                                <a href="#">Towel</a>
                                <a href="#">Shoes</a>
                                <a href="#">Coat</a>
                                <a href="#">Dresses</a>
                                <a href="#">Trousers</a>
                                <a href="#">Men's hats</a>
                                <a href="#">Backack</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-pic-zoom">
                                    <img class="product-big-img" src="{{asset('uploads/product_des/'.$product->image)}}" alt="">
                                    <div class="zoom-icon">
                                        <i class="fa fa-search-plus"></i>
                                    </div>
                                </div>
                                <div class="product-thumbs">
                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                        <div class="pt active" data-imgbigurl="{{asset('uploads/product_des/'.$product->image)}}">
                                            <img src="{{asset('uploads/product_des/'.$product->image)}}" alt="" height="140px">
                                        </div>
                                        @foreach ($product->productImage as $images)
                                        <div class="pt active" data-imgbigurl="{{asset('uploads/product/'.$images->path)}}">
                                            <img src="{{asset('uploads/product/'.$images->path)}}" alt="" height="140px">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details">
                                    <div class="pd-title">
                                        <span>{{$product->brand->name}}</span>
                                        <h3>{{$product->name}}</h3>
                                        <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                    </div>
                                    <div class="pd-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>({{count($product->productComment)}})</span>
                                    </div>
                                    <div class="pd-desc">
                                        <p></p>
                                        <h4>
                                            @if ($product->discount)
                                                {{$product->discount}}.000 <sup>đ</sup>
                                                @else
                                                {{$product->price}}.000 <sup>đ</sup>
                                            @endif
                                            <span>
                                                @if ($product->discount)
                                                {{$product->price}}.000 <sup>đ</sup>
                                                @endif
                                            </span>
                                        </h4>
                                    </div>
                                    <div class="pd-color">
                                        <h6>Color</h6>
                                        <div class="pd-color-choose">
                                            <div class="cc-item">
                                                <input type="radio" name="" id="cc-black">
                                                <label for="cc-black"></label>
                                            </div>
                                            <div class="cc-item">
                                                <input type="radio" name="" id="cc-yellow">
                                                <label for="cc-yellow" class="cc-yellow"></label>
                                            </div>
                                            <div class="cc-item">
                                                <input type="radio" name="" id="cc-violet">
                                                <label for="cc-violet" class="cc-violet"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pd-size-choose">
                                        @foreach ($product->product_size as $si)
                                        <div class="sc-item">
                                            <input type="radio" name="" id="sm-{{$si->size->name}}">
                                            <label for="sm-size">{{$si->size->name}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="" id="" value="1">
                                        </div>
                                        <a href="#" class="primary-btn pd-card">Add To Cart</a>
                                    </div>
                                    <ul class="pd-tags">
                                        <li><span>CATEGORIES</span>: {{$product->productCategory->name}}</li>
                                        <li><span>TAGS</span>: {{$product->tag}}</li>
                                    </ul>
                                    <div class="pd-share">
                                        {{-- <div class="p-code">Sku: 00012</div> --}}
                                        <div class="pd-social">
                                            <a href="#"><i class="ti-facebook"></i></a>
                                            <a href="#"><i class="ti-twitter-alt"></i></a>
                                            <a href="#"><i class="ti-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab">
                            <div class="tab-item">
                                <ul class="nav" role="tablist">
                                    <li><a class="active" href="#tab-1" data-toggle="tab" role="tab">DECRIPTION</a></li>
                                    <li><a href="#tab-2" data-toggle="tab" role="tab">SPECIFICATION</a></li>
                                    <li><a href="#tab-3" data-toggle="tab" role="tab">Customer Reviews ({{count($product->productComment)}})</a></li>
                                </ul>
                            </div>
                            <div class="tab-item-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                        <div class="product-content">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                {!!$product->description!!}
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                        <div class="specification-table">
                                            <table>
                                                <tr>
                                                    <td class="p-catagory">Customer Rating</td>
                                                    <td>
                                                        <div class="pd-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>({{count($product->productComment)}})</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Price</td>
                                                    <td>
                                                        <div class="pd-price">
                                                          @if ($product->discount)
                                                              {{$product->discount}}.000 <sup>đ</sup>
                                                              @else
                                                              {{$product->price}}.000 <sup>đ</sup>
                                                          @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Add To Cart</td>
                                                    <td>
                                                        <div class="cart-add">
                                                            + add to cart
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Availability</td>
                                                    <td>
                                                        <div class="p-stock">22 in stock</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Size</td>  
                                                    <td>
                                                        <div class="p-size">
                                                            @foreach ($product->product_size as $si)
                                                           {{$si->size->name}} &nbsp;
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Color</td>  
                                                    <td>
                                                        <span class="cs-color"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Sku</td>  
                                                    <td>
                                                        <div class="p-code">00012</div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                        <div class="customer-review-option">
                                            <h4>{{count($product->productComment)}} Comments</h4>
                                            <div class="comment-option">
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img src="front/img/product-single/avatar-1.png" alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h5>Brandon Kelley <span>27 Aug 2022</span></h5>
                                                        <div class="at-reply">Nice !</div>
                                                    </div>
                                                </div>
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img src="front/img/product-single/avatar-2.png" alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h5>Brandon Kelley <span>27 Aug 2022</span></h5>
                                                        <div class="at-reply">Nice !</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Shop Section End-->

        <!-- Related Product Section-->
        <div class="related-product spad" style="margin-top: -80px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Related Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($related_product as $key=>$related)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{asset('uploads/product_des/'.$related->image)}}" alt="" height="290px">
                                @if ($related->discount)
                                <div class="sale pp-sale">
                                    Sale
                                </div>
                                @endif
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href=""><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="{{route('san-pham', $related->slug)}}">+ Quick View</a></li>
                                    <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{$related->brand->name}}</div>
                                <a href="#">
                                    <h5>{{$related->name}}</h5>
                                </a>
                                <div class="product-price">
                                    @if ($related->discount)
                                        {{$related->discount}}.000 <sup>đ</sup>
                                        @else
                                        {{$related->price}}.000 <sup>đ</sup>
                                    @endif
                                    @if ($related->discount)
                                    <span> {{$related->price}}.000 <sup>đ</sup></span>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="front/img/products/product-1.jpg" alt="">
                                <div class="sale pp-sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href=""><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="product.html">+ Quick View</a></li>
                                    <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="front/img/products/product-2.jpg" alt="">
                                <div class="sale pp-sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href=""><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="product.html">+ Quick View</a></li>
                                    <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="front/img/products/product-3.jpg" alt="">
                                <div class="sale pp-sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href=""><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="product.html">+ Quick View</a></li>
                                    <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="front/img/products/product-4.jpg" alt="">
                                <div class="sale pp-sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href=""><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="product.html">+ Quick View</a></li>
                                    <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- elated Product Section End-->
@endsection