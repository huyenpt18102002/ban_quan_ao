@extends('client.layout.layout')
@section('title', 'Homepage')
@section('body')
        <!--Breadcrumb section-->
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="{{route('homepage')}}"><i class="fa fa-home"></i>Home</a>
                            <a href="{{route('shop')}}">Shop</a>
                            <span> {{$cateslug->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!--Breadcrumb section end-->

          <!--Product section end-->
     <div class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
              @include('client.layout.sidebar')
                </div>
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
                                    <form>
                                        @csrf
                                        <select name="sort" id="sort" class="sorting">
                                            <option value="{{Request::url()}}?sort_by=none">--Lọc theo giá--</option>
                                        <option value="{{Request::url()}}?sort_by=tangdan">Thấp đến cao</option>
                                            <option value="{{Request::url()}}?sort_by=giamdan">Cao đến thấp</option>
                                        </select>
                                    </form>
                                   
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
                                            {{round(100-($prod->discount/$prod->price*100))}}%
                                            <br>
                                            Sale
                                        </div>
                                        @endif
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href=""><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="{{route('san-pham', $prod->slug)}}">+ Xem chi tiết</a></li>
                                            <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{$prod->brand->name}}</div>
                                        <a href="{{route('san-pham', $prod->slug)}}">
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
                {{-- <livewire:client.category.index :product="$product" :cateslug="$cateslug"/> --}}
            </div>
        </div>
      </div>
      <!--Product section end-->
@endsection