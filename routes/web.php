<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
//use App\Http\Controllers\ProductController;
use Illuminate\Routing\RouteAction;
use Illuminate\Routing\RouteUri;
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


});
Route::get('/',[HomePageController::class,'index'])->name('shop');
Route::get('/categoryproduct/{id}',[HomePageController::class,'categorywiseproduct'])->name('category.product');
Route::get('/categorylist',[HomePageController::class,'categorylist'])->name('categorylist');
Route::get('/productdetails/{id}',[HomePageController::class,'productdetails'])->name('productdetails');

//addtocart
Route::post('addtocart',[CartController::class,'addtocart'])->name('addtocart');



Route::get('/about', function () {
    return view('shop.about');
})->name('about');

Route::get('/details', function () {
    return view('shop.product_details');
})->name('details');
