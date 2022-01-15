<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;

class HomePageController extends Controller
{
    public function index()
    {
        $categorys=Category::all();
        $products=Product::where('tranding','1')->take(10)->get();
        return view('shop.home',compact('categorys','products'));
    }
    public function categorywiseproduct($id)
    {
        $products=Product::where('cat_id',$id)->get();
        $cat_name=Category::find($id)->name;
        return view('shop.categoryproduct',compact('products','cat_name'));
    }
    public function categorylist()
    {
        $categorys=Category::all();
        return view('shop.categorylist',compact('categorys'));
    }
    public function productdetails($id)
    {
        $product=Product::where('id',$id)->first();
        $images=json_decode($product->image);
        return view('shop.product_details',compact('product','images'));
    }
}
