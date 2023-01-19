<div>
   <div class="col-lg-9 order-1 order-lg-2">
                    <div class="title">
                        <h3 style="text-transform:uppercase;">{{$cateslug->name}}</h3>
                    </div>
                    <p></p>
                    <p></p>
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select name="" id="" class="sorting">
                                        <option value="">Default sorting</option>
                                    </select>
                                   
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Hiển thị 01 - 12 tổng {{$product->count()}} sản phẩm</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach ($product as $key=>$prod)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="{{asset('uploads/product_des/'.$prod->image)}}" alt="" width="100%" height="290px">
                                        @if ($prod->discount)
                                        <div class="sale pp-sale">
                                            Sale
                                        </div>
                                        @endif
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href=""><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="{{route('san-pham', $prod->slug)}}">+ Quick View</a></li>
                                            <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{$prod->brand->name}}</div>
                                        <a href="#">
                                            <h5>{{$prod->name}}</h5>
                                        </a>
                                        <div class="product-price">
                                            @if ($prod->discount)
                                                {{$prod->discount}}.000 <sup>đ</sup>
                                                @else
                                                {{$prod->price}}.000 <sup>đ</sup>
                                            @endif
                                            @if ($prod->discount)
                                            <span> {{$prod->price}}.000 <sup>đ</sup></span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div style="text-center">
                    {!!$product->links("pagination::bootstrap-4")!!}
                    </div>
                </div>
</div>
