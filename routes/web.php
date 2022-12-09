<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProductCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });


//=========================ADMIN========================
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('admin');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('/user', UserController::class);

    Route::resource('/category', ProductCategoryController::class);

    Route::resource('/brand', BrandController::class);

    Route::resource('/product', ProductController::class);
    Route::get('product-image/{product_image_id}/delete', [ProductController::class, 'destroyImage']);
    Route::post('/product-size/{prod_size_id}', [ProductController::class, 'updateQtySize']);
    Route::get('/product-size/{prod_size_id}/delete', [ProductController::class, 'deleteQtySize']);

    Route::resource('/size', SizeController::class);

    //image product
    Route::resource('/product/{product_id}/image', ProductImageController::class);

    //slider
    Route::resource('/slider', SliderController::class);

});


//=========================CLIENT========================
Route::get('/', [ClientController::class, 'home'])->name('homepage');
Route::get('/shop', [ClientController::class, 'shop'])->name('shop');
Route::get('/shop/{slug}', [ClientController::class, 'category'])->name('danh-muc');
Route::get('/shop/san-pham/{slug}', [ClientController::class, 'product'])->name('san-pham');
