<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RateController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','Frontend\FrontendController@index');
Route::get('category',[FrontendController::class,'category']);
Route::get('category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'productview']);

Route::get('product-list',[FrontendController::class,'productlist']);
Route::post('searchProduct',[FrontendController::class,'searchProduct']);

Auth::routes();

Route::get('load-cart-data',[CartController::class,'cartcount']);
Route::post('add-to-cart',[CartController::class,'addProduct']);
Route::post('delete-cart-item',[CartController::class,'deleteProduct']);
Route::post('update-cart',[CartController::class,'updateCart']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('load-wishlist-data',[WishlistController::class,'wishlistcount']);
Route::post('add-to-wishlist',[WishlistController::class,'add']);
Route::post('remove-wishlist-item',[WishlistController::class,'remove']);


Route::middleware(['auth'])->group(function () {

    Route::get('cart',[CartController::class,'viewcart']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class,'placeOrder']);

    Route::get('my-orders',[UserController::class,'index']);
    Route::get('view-orders/{id}',[UserController::class,'view']);

    Route::get('wishlist',[WishlistController::class,'index']);

    Route::post('add-rating',[RateController::class,'add']);

    Route::get('add-review/{product_slug}/userreview',[ReviewController::class,'add']);
    Route::post('add-review',[ReviewController::class,'create']);
    Route::put('update-review',[ReviewController::class,'update']);
    Route::get('edit-review/{product_slug}/userreview',[ReviewController::class,'edit']);

});

Route::middleware(['auth', 'isAdmin'])->group(function () {

   Route::get('/dashboard','Admin\FrontendController@index');

   Route::get('categories','Admin\CategoryController@index');
   Route::get('add-category','Admin\CategoryController@add');
   Route::post('insert-category','Admin\CategoryController@create');
   Route::get('edit-category/{id}',[CategoryController::class,'edit']);
   Route::put('update-category/{id}',[CategoryController::class,'update']);
   Route::get('delete-category/{id}',[CategoryController::class,'destory']);

   Route::get('products','Admin\ProductController@index');
   Route::get('add-product','Admin\ProductController@add');
   Route::post('insert-product','Admin\ProductController@create');
   Route::get('edit-product/{id}',[ProductController::class,'edit']);
   Route::put('update-product/{id}',[ProductController::class,'update']);
   Route::get('delete-product/{id}',[ProductController::class,'destory']);

   Route::get('users','Admin\UserController@index');
   Route::get('view-users/{id}','Admin\UserController@view');

   Route::get('orders',[OrderController::class,'index']);
   Route::get('order-history',[OrderController::class,'orderHistory']);
   Route::get('admin/view-orders/{id}',[OrderController::class,'view']);
   Route::put('update-order/{id}',[OrderController::class,'updateOrder']);

});
