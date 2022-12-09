<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Product_Size;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Product::with('productCategory', 'brand')->orderBy('updated_at','DESC')->get();
        $category = ProductCategory::pluck('name','id');
        $brand = Brand::pluck('name','id');
        return view('admin.product.index', compact('list', 'category', 'brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = ProductCategory::pluck('name','id');
        $brand = Brand::pluck('name','id');
        $size = Size::where('status', '0')->get();
    
        return view('admin.product.form', compact('category', 'brand', 'size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        
        $product = new Product();
        $product->name = $data['name'];
        $product->slug = $data['slug'];
        $product->product_category_id = $data['category_id'];
        $product->brand_id = $data['brand_id'];
        $product->featured = $request->featured == true ? '0':'1';
        $product->tag = $data['tag'];
    
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->discount = $data['discount'];
        $product->sku = $data['sku'];
        $product->qty = 0;
        $product->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $product->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->file('image');

        if($get_image){

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.time().'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/product_des/',$new_image);
            $product->image = $new_image;
        }
        $product->save();

        
        if($request->hasFile('images')){

            $uploadPath = public_path().'/uploads/product/';

            foreach($request->file('images') as $imageFile){

                $get_name_image = $imageFile->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,9999).'.'.$imageFile->getClientOriginalExtension();
                $imageFile->move($uploadPath ,$new_image);
                $finalImagePathName = $new_image;

        $product->productImage()->create([
            'product_id' => $product->id,
            'path' => $finalImagePathName,
        ]);
    }
}

    if($request->size){
        foreach($request->size as $key=>$sizes){
            $product->product_size()->create([
                'product_id' => $product->id,
                'size_id' => $sizes,
                'quantity' => $request->sizequantity[$key] ?? 0
            ]);
        }
    }
        //toastr()->success('Success', 'Thêm phim thành công.');
       return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::with('productCategory', 'brand')->find($id);
        $product_sizes = $product->product_size->pluck('size_id')->toArray();
        $sizes = Size::whereNotIn('id', $product_sizes)->get();
        return view('admin.product.show', compact('product', 'product_sizes', 'sizes'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = ProductCategory::pluck('name','id');
        $brand = Brand::pluck('name','id');
        $product =  Product::find($id);
        $images = ProductImage::all();
        $product_sizes = $product->product_size->pluck('size_id')->toArray();
        $sizes = Size::whereNotIn('id', $product_sizes)->get();
    
        return view('admin.product.form', compact('category', 'brand', 'product', 'images', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        
        $product =  Product::find($id);
        $product->name = $data['name'];
        $product->slug = $data['slug'];
        $product->product_category_id = $data['category_id'];
        $product->brand_id = $data['brand_id'];
        $product->featured = $request->featured == true ? '0':'1';
        $product->tag = $data['tag'];
    
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->discount = $data['discount'];
        $product->sku = $data['sku'];
        $product->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $get_image = $request->file('image');

        $path = public_path().'/uploads/product_des/'.$product->image;
        if($get_image){
            if(file_exists($path)){
                unlink($path);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/product_des/',$new_image);
            $product->image = $new_image;

    }

        $product->save();

        if($request->hasFile('images')){

            $uploadPath = public_path().'/uploads/product/';

            foreach($request->file('images') as $imageFile){

                $get_name_image = $imageFile->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,9999).'.'.$imageFile->getClientOriginalExtension();
                $imageFile->move($uploadPath ,$new_image);
                $finalImagePathName = $new_image;

        $product->productImage()->create([
            'product_id' => $product->id,
            'path' => $finalImagePathName,
        ]);
        }
    }


        if($request->size){
            foreach($request->size as $key=>$sizes){
                $product->product_size()->create([
                    'product_id' => $product->id,
                    'size_id' => $sizes,
                    'quantity' => $request->sizequantity[$key] ?? 0
                ]);
            }
        }
        //toastr()->success('Success', 'Thêm sản phẩm thành công.');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        //xoa anh dai dien
        $path = public_path().'/uploads/product_des/'.$product->image;
        if(file_exists($path)){
            unlink($path);
        }       
        //xoa ảnh sp  
        if($product->productImage){
            foreach ($product->productImage as $image){
                $paths = public_path().'/uploads/product/'.$image->path;
                if(file_exists($paths)){
                    unlink($paths);
            }
        }
        ProductImage::whereIn('product_id', [$product->id])->delete();
    }
        $product->delete();
        //toastr()->info('Success', 'Xóa sản phẩm thành công.');
        return redirect()->back();
    }

    public function destroyImage(int $id)
    {
        $productImage = ProductImage::findOrFail($id);

        $paths = public_path().'/uploads/product/'.$productImage->path;
        if(File::exists($paths)){
            File::delete($paths);
        }
        $productImage->delete();
        return redirect()->back();
    }

    public function updateQtySize(Request $request, $prod_size_id)
    {
        $productSizeData = Product::findOrFail($request->product_id)->product_size()->where('id', $prod_size_id)->first();

        $productSizeData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message'=> 'Cập nhật số lượng size thành công!']);
    }

    public function deleteQtySize($prod_size_id)
    {
        $prodSize = Product_Size::findOrFail($prod_size_id);
        $prodSize->delete();
        return response()->json(['message'=> 'Xóa size thành công!']);
    }
    
    
}
