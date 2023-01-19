<?php

namespace App\Http\Controllers\Client;

use session;
use Carbon\Carbon;
use App\Models\Size;
use App\Models\Order;
use App\Models\Store;
use App\Models\Payment;
use App\Models\OrderDetail;
use Darryldecode\Cart\Cart;
use App\Models\Product_Size;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function checkout()
    {
        if(Auth::check()){
            if(\Cart::getContent()->isEmpty())
            {
                toastr()->warning('Cảnh báo', 'Không thể thanh toán! Hãy thêm sản phẩm bạn muốn mua vào giỏ hàng.');
               return redirect()->back(); 
            }
            else{
                $info = Store::first();
                $category = ProductCategory::get();
                $list_payment = Payment::get();
                $cart = \Cart::getContent();
            return view('client.checkout.checkout', compact('category','info', 'list_payment', 'cart'));
            }
        }
       else{
        if(\Cart::getContent()->isEmpty())
        {
            toastr()->warning('Cảnh báo', 'Không thể thanh toán! Hãy thêm sản phẩm bạn muốn mua vào giỏ hàng.');
           return redirect()->back(); 
        }
        else{
        toastr()->error('Lỗi', 'Vui lòng đăng nhập để thanh toán!');
        return redirect()->route('login'); 
        }
       }
    }

    public function checkout_process(Request $request)
    {
        if(!isset($request->payment)){
            toastr()->warning('Cảnh báo', 'Vui lòng chọn phương thức thanh toán.');
            return redirect()->back();
        }
        
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'status' => '0',
            'payment_id' => $request->payment,
        ]);

        $cartitems = \Cart::getContent();
        //dd($cartitems);
        foreach($cartitems as $items){
            $orderItem = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $items->attributes->id,
                'size' => $items->attributes->size,
                'qty' => $items->quantity,
                'total' => $items->quantity*$items->price,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ]);

            $prodSize = Product_Size::where('id', $items->attributes->size_id)->decrement('quantity', $items->quantity);

        }

        \Cart::clear();
        toastr()->success('Thành công', 'Mua hàng thành công!');
        return redirect()->route('homepage');
    }

    public function history_purchase()
    {
        if(!Auth::check()){
            toastr()->success('Cảnh báo', 'Vui lòng đăng nhập để xem!');
            return redirect()->route('login');
        }
        $info = Store::first();
        $category = ProductCategory::get();
       $order = Order::with('orderDetail')->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('client.checkout.history_purchase', compact('order', 'info', 'category')); 
    }

    public function history_detail($id)
    {
        $info = Store::first();
        $category = ProductCategory::get();
        $order = Order::with('payment', 'user')->find($id);
        $orderdetail = OrderDetail::with('order', 'product')->where('order_id', $id)->orderBy('created_at', 'DESC')->get();
        $total_order = OrderDetail::with('order')->where('order_id', $id)->sum('total');
        return view('client.checkout.history_detail', compact('orderdetail', 'order', 'total_order', 'info', 'category')); 
    }

    public function client_huy(Request $request, $id)
    {
        $data = $request->all();
        $order =  Order::find($id);
        $order->status = '4';
        $order->save();
        toastr()->success('Thành công', 'Hủy đơn hàng thành công.');
        return redirect()->back();
    }

    public function client_nhan_hang(Request $request, $id)
    {
        $data = $request->all();
        $order =  Order::find($id);
        $order->status = '3';
        $order->save();
        toastr()->success('Thành công', 'Xác nhận đơn hàng thành công.');
        return redirect()->back();
    }
}
