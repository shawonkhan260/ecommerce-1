<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// use App\Http\Controllers\CategoryController;

Route::get('welcome', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
        //return "this is admin";
    })->name('dashboard');
    Route::get('category',[CategoryController::class,'index'])->name('category');
    //Route::get('category','CategoryController@index')->name('category');
    Route::get('category_add',[CategoryController::class,'create'])->name('category.add');
    Route::post('category_store',[CategoryController::class,'store'])->name('category.store');
    Route::post('category_test',[CategoryController::class,'test'])->name('category.test');
    Route::get('category_edit/{category}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('category_update/{category}',[CategoryController::class,'update'])->name('category.update');
    Route::get('category_delete/{category}',[CategoryController::class,'destroy'])->name('category.delete');
    Route::resource('product',ProductController::class);

    //pending order list
    Route::get('pendingorderlist',[OrderController::class,'pendingorder'])->name('pendingorder.list');
    Route::get('allorderlist',[OrderController::class,'allorder'])->name('allorder.list');
    Route::post('productapprove/{id}',[OrderController::class,'productapprove'])->name('productapprove');
    Route::get('showorderdetails/{id}',[OrderController::class,'showorderdetails'])->name('showorderdetails');
    Route::get('adminprofile', function () {
        return view('admin.profile');
    })->name('profile');

});

//ecommerce home
Route::get('/',[HomePageController::class,'index'])->name('shop');
Route::get('/categoryproduct/{id}',[HomePageController::class,'categorywiseproduct'])->name('category.product');
Route::get('/categorylist',[HomePageController::class,'categorylist'])->name('categorylist');
Route::get('/productdetails/{id}',[HomePageController::class,'productdetails'])->name('productdetails');
Route::get('/productlist',[HomePageController::class,'productlist'])->name('product.list');
Route::get('/search',[HomePageController::class,'searchproduct'])->name('search');
Route::get('autocomplete',[HomePageController::class,'autocomplete'])->name('autocomplete');

Route::middleware(['auth'])->group(function () {
    //profile
    Route::get('userprofile', function () {
        return view('shop.profile');
    })->name('userprofile');
    Route::post('editprofile',[HomeController::class,'editprofile'])->name('editprofile');

    //addtocart
    Route::post('addtocart',[CartController::class,'addtocart'])->name('addtocart');
    Route::get('cart',[CartController::class,'index'])->name('cart');
    Route::get('cartdelete/{cart}',[CartController::class,'destroy'])->name('cart.destroy');
    Route::post('cartupdate',[CartController::class,'update'])->name('cart.update');
    Route::get('cartcount',[CartController::class,'cartcount'])->name('cart.count');


    //addtowishlist
    Route::get('wishlist',[WishlistController::class,'index'])->name('wishlist');
    Route::post('addtowishlist',[WishlistController::class,'addtowishlist'])->name('addtowishlist');
    Route::get('wishlistcount',[WishlistController::class,'wishlistcount'])->name('wishlist.count');

    //checkout
    Route::get('checkout',[CheckoutController::class,'index'])->name('checkout');
    Route::post('checkoutstore',[CheckoutController::class,'store'])->name('checkout.store');
    Route::post('cancleorder{id}',[CheckoutController::class,'cancleorder'])->name('cancleorder');
    Route::post('razorpay',[CheckoutController::class,'razorpay'])->name('razorpay');

    //productorderlist user
    Route::get('orderlist',[CheckoutController::class,'orderlist'])->name('orderlist');
    Route::get('orderdetails/{id}',[CheckoutController::class,'orderdetails'])->name('orderdetails');

});

//product details
Route::get('/details', function () {
    return view('shop.product_details');
})->name('details');

//wishlist remove button
Route::post('wishlistremove',[WishlistController::class,'wishlistremove'])->name('wishlist.remove');
