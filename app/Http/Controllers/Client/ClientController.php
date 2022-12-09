<?php

namespace App\Http\Controllers\Client;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    //
    public function home()
    {
        $slider = Slider::all();
        $category = ProductCategory::get();
      
        return view('client.home', compact('slider', 'category'));
    }

    public function shop()
    {
        $category = ProductCategory::get();
        $brand = Brand::get(); 
        $product_shop = Product::with('brand')->orderBy('updated_at', 'DESC')->paginate(12);
        //dd($product_shop);
        return view('client.shop', compact('product_shop', 'category', 'brand'));
    }

    public function category($slug)
    {
        $category = ProductCategory::get();
        $brand = Brand::get();
        $cate_slug = ProductCategory::where('slug',$slug)->first();
        $product = Product::where('product_category_id',$cate_slug->id)->orderBy('updated_at', 'DESC')->paginate(12);

        return view('client.category', compact('cate_slug', 'product', 'category', 'brand'));
    }

    public function product($slug)
    {
        $category = ProductCategory::get();
        $brand = Brand::get(); 
        $product = Product::with('productCategory','brand', 'productImage', 'product_size', 'productComment')->where('slug',$slug)->first();
        $related_product = Product::with('productCategory')->where('product_category_id',$product->productCategory->id)
        ->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get()->take(7);
        return view('client.product', compact('product', 'category', 'brand', 'related_product'));
    }
}
