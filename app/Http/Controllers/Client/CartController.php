<?php

namespace App\Http\Controllers\Client;

use session;
use App\Models\Size;
use App\Models\Store;
use App\Models\Product;
use App\Models\Product_Size;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //
    public function list_cart()
    {
        
        if(\Cart::getContent()->isEmpty())
        {
            toastr()->warning('Cảnh báo', 'Không có sản phẩm nào trong giỏ hàng của bạn!');
           return redirect()->back(); 
        }
        else{
            $info = Store::first();
            $category = ProductCategory::get();
            $cart = \Cart::getContent();
          // dd($cart);
            return view('client.cart.show', compact('category', 'cart', 'info'));
        }
    }

    public function add_cart(Request $request)
    {
        $product_id = $request->product_id_hidden;
        $product =  Product::with('product_size')->find($product_id);
        $sizeid = $request->size_id;
        $product_size =  Product_Size::with('size')->find($sizeid);
        $sizename = $product_size->size->name;
        $quantity = $request->qty;
        $qtykho = $product_size->quantity;
        if($quantity > $qtykho){
            toastr()->error('Lỗi', 'Số lượng sản phẩm trong kho không đủ. Vui lòng giảm số lượng bạn đã chọn!');
            return redirect()->back(); 
        }elseif
        ($quantity == 0){
            toastr()->error('Lỗi', 'Số lượng sản phẩm không hợp lệ!');
            return redirect()->back(); 
        }elseif(!isset($request->size_id)){
            toastr()->error('Lỗi', 'Vui lòng chọn size!');
            return redirect()->back(); 
        }
        else{
        \Cart::add(array(
            'id' => $product_id.'.'.$sizeid,
            'name' => $product->name,
            'quantity' => $request->qty,
            'price' => $product->discount ?? $product->price,
            'image' => $product->image,
            'attributes' => array(
                'id' => $product->id,
                'quantity' => $qtykho,
                'size_id' => $sizeid,
                'size' => $sizename,
                'image' => $product->image,
                'slug' => $product->slug,
                'price_origin'=>$product->price_origin,
            ),
        ));
        toastr()->success('Thành công', 'Thêm vào giỏ hàng thành công.');
        return redirect()->route('list-cart');
    }
    }

    public function update_cart(Request $request)
    {
        $sizeid = $request->size_id;
        $product_size =  Product_Size::with('size')->find($sizeid);
        $qtykho = $product_size->quantity;
        if($request->quantity == 0){
            toastr()->error('Lỗi', 'Số lượng sản phẩm không hợp lệ!');
            return redirect()->back(); 
        }
        elseif($request->quantity > $qtykho){
            toastr()->error('Lỗi', 'Số lượng sản phẩm trong kho không đủ. Vui lòng giảm số lượng bạn đã chọn!');
            return redirect()->back(); 
        }
         else{
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        toastr()->success('Thành công', 'Cập nhật vào giỏ hàng thành công.');

        return redirect()->route('list-cart');
    }
    }

    public function delete_cart(Request $request)
    {
        if(\Cart::getContent()->count() == 1)
        {
            \Cart::remove($request->id);
            toastr()->success('Thành công', 'Xóa sản phẩm khỏi giỏ hàng thành công.');
           return redirect()->route('homepage');
        }
        else{
        \Cart::remove($request->id);
        toastr()->success('Thành công', 'Xóa sản phẩm khỏi giỏ hàng thành công.');

        return redirect()->route('list-cart');
        }
    }

    public function clear_all_cart()
    {
        \Cart::clear();
        toastr()->success('Thành công', 'Xóa toàn bộ giỏ hàng thành công.');

        return redirect()->route('homepage');
    }

}
