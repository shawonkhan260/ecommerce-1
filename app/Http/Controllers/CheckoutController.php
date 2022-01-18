<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\orderlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart=cart::where('user_id',Auth::id())->get();
        if (cart::where('user_id',Auth::id())->exists()) {
            $userinfo=order::where('user_id',Auth::id())->latest()->first();
            return view('shop.checkout',compact('cart','userinfo'));
        }

        else {
            return redirect()->route('shop')->with('status','please add product to cart first');

        }
    }
    public function store(Request $request)
    {
        $order= new order();
        $order->name=$request->name;
        $order->email=$request->email;
        $order->phone=$request->phone;
        $order->address1=$request->address1;
        $order->address2=$request->address2;
        $order->city=$request->city;
        $order->state=$request->state;
        $order->country=$request->country;
        $order->zipcode=$request->zip;
        $order->user_id=Auth::id();
        $order->tracking_id='shawon'.rand(100000,999999);
        $order->save();

        $cartitems=cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item)
        {
            $orderlist= new orderlist();
            $orderlist->order_id=$order->id;
            $orderlist->product_id=$item->product_id;
            $orderlist->product_qty=$item->product_qty;
            $orderlist->product_price=$item->product->selling_price;
            $orderlist->save();

        }
        cart::destroy($cartitems);
        return redirect()->route('shop')->with('status',"order placed successfully");

    }
}
