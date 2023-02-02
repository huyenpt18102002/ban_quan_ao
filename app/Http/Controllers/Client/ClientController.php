<?php

namespace App\Http\Controllers\Client;
use session;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Store;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductComment;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class ClientController extends Controller
{
    //
    
    public function timkiem()
    {
        if(isset($_GET['search']) && !empty($_GET['search'])){
           $search =  $_GET['search'];
          
           if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
           // dd($sort_by);
           if($sort_by == 'tangdan'){
               $product_shop = Product::where('name', 'LIKE', '%'.$search.'%')->orderBy('price', 'ASC')->paginate(9);
           }elseif($sort_by == 'giamdan'){
               $product_shop = Product::where('name', 'LIKE', '%'.$search.'%')->orderBy('price', 'DESC')->paginate(9); 
           }
       }
       else{
           $product = Product::where('name', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'DESC')->paginate(9);
       }

            $category = ProductCategory::get();
            $brand = Brand::get();
            $info = Store::first();
            $min_price = Product::min('price');
             $max_price = Product::max('price');
          
           return view('client.search', compact('search', 'product', 'category', 'brand', 'info', 'min_price', 'max_price'));
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

    public function shop(Request $request)
    {
        $info = Store::first();
        $category = ProductCategory::get();
        $brand = Brand::get(); 
        $min_price = Product::min('price');
        $max_price = Product::max('price');
        if(isset($_GET['sort_by'])){
             $sort_by = $_GET['sort_by'];
            // dd($sort_by);
            if($sort_by == 'tangdan'){
                $product = Product::with('brand')->where('status', 0)->orderBy('price', 'ASC')->paginate(9);
            }elseif($sort_by == 'giamdan'){
                $product = Product::with('brand')->where('status', 0)->orderBy('price', 'DESC')->paginate(9); 
            }
        }
        else{
            //brand
            $brands = $request->brand ?? [];
            $brand_ids = array_keys($brands);
            //price

    $product = Product::with('brand')->where('status', 0);
    if($brand_ids != null){
        $product = $product->whereIn('brand_id', $brand_ids);
    }if(isset($_GET['start_price']) && $_GET['end_price']){
        $priceMin = $_GET['start_price'];
        $priceMax =  $_GET['end_price'];
        $product = $product->whereBetween('price',[$priceMin, $priceMax]);
    }
    
    $product = $product->orderBy('updated_at', 'DESC')->paginate(9);
        }
       return view('client.shop', compact('product', 'category', 'brand', 'info', 'min_price', 'max_price'));
    }

    public function category($slug, Request $request)
    {
        $info = Store::first();
        $category = ProductCategory::get();
        $brand = Brand::get();
        $cateslug = ProductCategory::where('slug',$slug)->first();
        $min_price = Product::min('price');
        $max_price = Product::max('price');
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
           if($sort_by == 'tangdan'){
               $product = Product::with('brand')->where('status', 0)->where('product_category_id',$cateslug->id)->orderBy('price', 'ASC')->paginate(9);
           }elseif($sort_by == 'giamdan'){
               $product = Product::with('brand')->where('status', 0)->where('product_category_id',$cateslug->id)->orderBy('price', 'DESC')->paginate(9); 
           }
       }
       else{
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);

        $product = Product::with('brand')->where('status', 0)->where('product_category_id',$cateslug->id);
        if($brand_ids != null){
            $product = $product->whereIn('brand_id', $brand_ids);
        }
        $product = $product->orderBy('updated_at', 'DESC')->paginate(9);
       
       }
        return view('client.shop', compact('cateslug', 'product', 'category', 'brand', 'info', 'min_price', 'max_price'));
    }

    private function filter($product, Request $request)
    {
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);
        $product = $brand_ids != null ? $product->whereIn('brand_id', $brand_ids) : $product;
        return $product;
    }
    
    public function product($slug)
    {
        $info = Store::first();
        $category = ProductCategory::get();
        $brand = Brand::get(); 
        $product = Product::with('productCategory','brand', 'productImage', 'product_size', 'productComment')->where('status', 0)->where('slug',$slug)->first();
        $avg_rating =  ProductComment::where('product_id', $product->id)->avg('rating');
        $avg_rating = round($avg_rating);
        $related_product = Product::with('productCategory')->where('status', 0)->where('product_category_id',$product->productCategory->id)
        ->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get()->take(4);
        
        $min_price = Product::min('price');
        $max_price = Product::max('price');
        return view('client.product', compact('product', 'avg_rating', 'category', 'brand', 'related_product', 'info', 'min_price', 'max_price'));
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

    //filter product
    public function sort_asc(Request $request)
    {
        $info = Store::first();
        $category = ProductCategory::get();
        $brand = Brand::get(); 
        $product_shop = Product::with('brand')->where('status', 0)->orderBy('price', 'ASC')->paginate(9);
        return redirect()->back();
    }
}
