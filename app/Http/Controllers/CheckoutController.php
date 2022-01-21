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
        $order->totall=$request->total;
        $order->payment_method=$request->payment_method;
        $order->payment_id=$request->payment_id;
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
        if ($order->payment_method=="paid by razor pay") {
            return response()->json(['status'=>"order placed successfully"]);
        }
        return redirect()->route('shop')->with('status',"order placed successfully");

    }

    public function orderlist()
    {
        $orders=Order::where('user_id',Auth::id())->get();
        return view('shop.productorderlist',compact('orders'));
    }
    public function orderdetails($id)
    {
        $order=Order::find($id);
        return view('shop.userorderdetails',compact('order'));
    }
    public function cancleorder($id,Request $request)
    {
        $order=Order::where('user_id',Auth::id())->where('id',$id)->first();
        $order->status=$request->status;
        $order->update();
        return back();
    }

    public function razorpay(Request $request)
    {
        $cart=cart::where('user_id',Auth::id())->get();
        $total_price=0;
        foreach ($cart as $item) {
            $total_price+=$item->product->selling_price * $item->product_qty;
        }
        $name=$request->name;
        $phone=$request->phone;
        $email=$request->email;
        $address1=$request->address1;
        $country=$request->country;
        $state=$request->state;
        $city=$request->city;
        $zip=$request->zip;
        return response()->json([
            'name'=>$name,
            'phone'=>$phone,
            'email'=>$email,
            'address1'=>$address1,
            'country'=>$country,
            'state'=>$state,
            'city'=>$city,
            'zip'=>$zip,
            'total_price'=>$total_price
        ]);
    }
}
