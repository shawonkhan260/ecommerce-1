<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderlist;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pendingorder()
    {
        $orders=order::where('status','0')->get();
        return view('admin.productorder',compact('orders'));
    }
    public function productapprove(Request $request,$id)
    {
        $order=order::find($id);
        $order->status=$request->status;
        $order->update();
        return back()->with('status','order approved successfully');
    }
    public function allorder()
    {
        $orders=order::all();
        return view('admin.productorder',compact('orders'));
    }
    public function showorderdetails($id)
    {
        $order=order::find($id);
        return view('admin.orderdetails',compact('order'));
    }
}
