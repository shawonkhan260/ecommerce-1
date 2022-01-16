<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {
        $product_id=$request->product_id;
        $product_qty=$request->product_qty;
        if (Auth::check()) {
            $product=product::where('id',$product_id)->first();

            if (Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()) {
                return response()->json(['status'=>$product->name." Already Added to cart"]);

            }
            else{
                $cart=new cart();
                $cart->product_id= $product_id;
                $cart->product_qty= $product_qty;
                $cart->user_id= Auth::id();
                $cart->save();
                return response()->json(['status'=>$product->name." Added to cart"]);
            }
        }
        else
        {
            return response()->json(['status'=>"Login to Continue"]);
        }
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(cart $cart)
    {
        //
    }


    public function edit(cart $cart)
    {
        //
    }


    public function update(Request $request, cart $cart)
    {
        //
    }


    public function destroy(cart $cart)
    {
        //
    }
}
