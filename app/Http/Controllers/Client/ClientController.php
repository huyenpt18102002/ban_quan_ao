<?php

namespace App\Http\Controllers\Client;
use session;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Store;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    //

    public function timkiem()
    {
        if(isset($_GET['search'])){
           $search =  $_GET['search'];
          
           $product = Product::where('name', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'DESC')->paginate(12);

            $category = ProductCategory::get();
            $brand = Brand::get();
            $info = Store::first();
          
           return view('client.search', compact('search', 'product', 'category', 'brand', 'info'));
        }else{
            return redirect()->to('/');
        }
    }

    public function home()
    {
        $info = Store::first();
        $slider = Slider::all();
        $category = ProductCategory::get();
        $blog = Blog::orderBy('updated_at', 'DESC')->get()->take(3);
        $product_nu = Product::where('status', 0)->where('featured', 0)->where('tag', 'LIKE', '%nu%')->orderBy('updated_at', 'DESC')->paginate(10);
        $product_nam = Product::where('status', 0)->where('featured', 0)->where('tag', 'LIKE', '%nam%')->orderBy('updated_at', 'DESC')->paginate(10);
      
        return view('client.home', compact('slider', 'category', 'product_nu', 'product_nam', 'blog', 'info'));
    }

    public function shop()
    {
        $info = Store::first();
        $category = ProductCategory::get();
        $brand = Brand::get(); 
        $product_shop = Product::with('brand')->where('status', 0)->orderBy('updated_at', 'DESC')->paginate(9);
        return view('client.shop', compact('product_shop', 'category', 'brand', 'info'));
    }

    public function category($slug)
    {
        $info = Store::first();
        $category = ProductCategory::get();
        $brand = Brand::get();
        $cateslug = ProductCategory::where('slug',$slug)->first();
        $product = Product::where('status', 0)->where('product_category_id',$cateslug->id)->orderBy('updated_at', 'DESC')->paginate(9);

        return view('client.category', compact('cateslug', 'product', 'category', 'brand', 'info'));
    }

    public function product($slug)
    {
        $info = Store::first();
        $category = ProductCategory::get();
        $brand = Brand::get(); 
        $product = Product::with('productCategory','brand', 'productImage', 'product_size', 'productComment')->where('status', 0)->where('slug',$slug)->first();
        $related_product = Product::with('productCategory')->where('status', 0)->where('product_category_id',$product->productCategory->id)
        ->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get()->take(4);

        return view('client.product', compact('product', 'category', 'brand', 'related_product', 'info'));
    }

    public function blog()
    {
        $info = Store::first();
        $category = ProductCategory::get();
        $blog_new = Blog::orderBy('updated_at', 'DESC')->get()->take(5);
        $blog = Blog::orderBy(DB::raw('RAND()'))->paginate(8);
        return view('client.blog', compact('blog', 'blog_new', 'category', 'info'));
    }

    public function blog_detail($slug)
    {
        $info = Store::first();
        $category = ProductCategory::get();
        $brand = Brand::get();  
        $blog_detail = Blog::with('user')->where('slug',$slug)->first();
        $blog_more = Blog::orderBy('updated_at', 'ASC')->whereNotIn('slug',[$slug])->first();
        $blog_more2 = Blog::orderBy('updated_at', 'DESC')->whereNotIn('slug',[$slug])->first();
        return view('client.blog_detail', compact('category', 'brand', 'info', 'blog_detail', 'blog_more', 'blog_more2'));
    } 

    public function contact()
    {
        $info = Store::first();
        $category = ProductCategory::get();
        return view('client.contact', compact('category', 'info'));
    }
}
