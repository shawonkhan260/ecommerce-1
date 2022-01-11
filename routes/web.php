<?php

use App\Http\Controllers\CategoryController;
//use App\Http\Controllers\ProductController;
use Illuminate\Routing\RouteAction;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ad', function () {
    return view('admin.dashboard');
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
