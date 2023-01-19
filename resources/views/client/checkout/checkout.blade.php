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
                    <span> Thanh toán</span>
                </div>
            </div>
        </div>
    </div>
</div>
  <!--Breadcrumb section end-->
   <!--Check out Section Begin-->
   <div class="checkout-section spad">
    <div class="container">
        <form action="{{route('check-out-process')}}" method="POST" class="checkout-form">
            @csrf
            <div class="row">
                <div class="col-lg-4">
                   
                    <h4>Chi tiết đơn hàng</h4>
                    <div class="row">
                       <div class="col-lg-12">
                        <label for="fir">Tên người nhận:</label>
                       <h5><i>{{Auth::user()->name}}</i></h5>
                       </div>
                       <div class="col-lg-12">
                        <label for="last">Email:</label>
                        <h5><i>{{Auth::user()->email}}</i></h5>
                       </div>
                       <div class="col-lg-12">
                        <label for="cun-name">Số điện thoại:</label>
                        <h5><i>{{Auth::user()->phone}}</i></h5>
                       </div>
                       <div class="col-lg-12">
                        <label for="cun">Địa chỉ nhận hàng: </label>
                        <h5><i>{{Auth::user()->address}}</i></h5>
                       </div>
                    </div>
                </div>
                <div class="col-lg-8">
                   
                    <div class="place-order">
                        <h4>Sản phẩm của bạn</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Sản phẩm <span>Tổng</span></li>
                                @foreach ($cart as $item)
                                <input type="hidden" value="{{$item->quantity}}" name="qty">
                                     <li class="fw-normal">{{$item->name}} x {{$item->quantity}} 
                                        <br>Size: <b>{{$item->attributes->size}}</b>
                                        <span>{{number_format($item->quantity * $item->price).',000'}} <sup>đ</sup></span>
                                    </li>
                                @endforeach
                                <li class="fw-normal">Subtotal <span>{{number_format(Cart::getTotal()).',000'}} <sup>đ</sup></span></li>
                                <li class="total-price">Total<span>{{number_format(Cart::getSubTotal()).',000'}} <sup>đ</sup></span></li>
                            </ul>
                            <div class="payment-check">
                                @foreach ($list_payment as $key=>$list)
                                <div class="pc-item">
                                    <label for="pc-check">
                                     {{$list->name}}
                                        <input type="checkbox" name="payment" id="pc-check" value="{{$list->id}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
 <!--Check out Section End-->
@endsection