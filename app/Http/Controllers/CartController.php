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
        if (Auth::check()) {
            if (cart::where('user_id',Auth::id())->exists()) {
                $carts=cart::where('user_id',Auth::id())->get();
                return view('shop.cart',compact('carts'));
            }
            else {
            return redirect()->route('shop')->with('status','please add product to cart first');
            }

        }
        else
        {
            return back()->with('status','please log in first');
        }

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
        $product_qty=$request->product_qty;
        $cart_id=$request->cart_id;
        $cartid=cart::where('id',$cart_id)->where('user_id',Auth::id())->first();
        $cartid->product_qty=$product_qty;
        $cartid->update();
        return response()->json(['status'=>" Cart Updated successfully"]);


    }


    public function destroy(Cart $cart)
    {
        $cart->where('user_id',Auth::id())->first();
        $cart->delete();
        return back()->with('status','product deleted from cart successfully');
    }

    public function cartcount()
    {
        $cart=Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=> $cart]);
    }
}
