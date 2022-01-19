<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addtowishlist(Request $request)
    {
        $product_id=$request->product_id;
        if (Auth::check()) {
            $product=product::where('id',$product_id)->first();

            if (wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->exists()) {
                return response()->json(['status'=>$product->name." Already Added to wishlist"]);

            }
            else{
                $wishlist=new wishlist();
                $wishlist->product_id= $product_id;
                $wishlist->user_id= Auth::id();
                $wishlist->save();
                return response()->json(['status'=>$product->name." Added to wishlist"]);
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
            $wishlist=wishlist::where('user_id',Auth::id())->get();
            return view('shop.wishlist',compact('wishlist'));
        }
        else
        {
            return back()->with('status','please log in first');
        }

    }
    public function wishlistcount()
    {
        $wishlist=wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=> $wishlist]);
    }
    public function wishlistremove(Request $request)
    {
        $wishlist=wishlist::find($request->wishlist_id);
        $wishlist->delete();
        return response()->json(['status'=>" item deleted from wishlist successfully"]);
    }
}
