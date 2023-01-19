<div class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('client.layout.sidebar')
             
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
                                <div class="pd-size-choose">
                                    @foreach ($product->product_size as $si)
                                    @if ($si->quantity == 0)
                                    <div class="sc-item">
                                        <input type="radio" value="{{$si->id}}" id="sm-{{$si->size->name}}">
                                        <label class="sizeSelectLabel" for="sm-size" aria-disabled="true" style="
                                            color: rgba(0,0,0,.26);
                                            cursor: not-allowed;">{{$si->size->name}}</label>
                                    </div> 
                                    @else
                                    <div class="sc-item">
                                        <input type="radio" value="{{$si->id}}" id="sm-{{$si->size->name}}">
                                        <label class="sizeSelectLabel" for="sm-size" aria-disabled="false">{{$si->size->name}}</label>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="qty" id="" value="1" min="1">
                                    </div>
                                    <input type="hidden" name="product_id_hidden" id="" value="{{$product->id}}">
                                
                                    <button type="submit" class="primary-btn pd-card">Thêm vào giỏ hàng</button>
                            
                                </div>
                                <ul class="pd-tags">
                                    <li><span>DANH MỤC</span>: {{$product->productCategory->name}}</li>
                                    <li><span>TAGS</span>: {{$product->tag}}</li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Sku: {{$product->sku}}</div>
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
                            <li><a class="active" href="#tab-1" data-toggle="tab" role="tab">CHI TIẾT SẢN PHẨM</a></li>
                            <li><a href="#tab-2" data-toggle="tab" role="tab">ĐẶC TẢ SẢN PHẨM</a></li>
                            <li><a href="#tab-3" data-toggle="tab" role="tab">BÌNH LUẬN ({{count($product->productComment)}})</a></li>
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
                                            <td class="p-catagory">Sku</td>  
                                            <td>
                                                <div class="p-code"> {{$product->sku}}</div>
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
