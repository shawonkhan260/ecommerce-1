<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    //for getting product single details or full list
    public function product($id=NULL)
    {
        if ($id=="") {
            $product=product::all();
            return response()->json(['product'=>$product,200]);
        }
        else {
            $product=product::find($id);
            return response()->json(['product'=>$product,200]);
        }
    }
    // try to fetch api without ajax only for different server or site api
    public function controllerapi()
    {
        //for own api call
        //$request = Request::create('/api/product/', 'GET');
        //$datas = json_decode(Route::dispatch($request)->getContent());
        //$datas = Route::dispatch($request); (also work insted of 2nd line)
        //in view $data->name
        $datas=Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        return view('controllerapi',compact('datas'));

    }
    //this option is for new product add
    public function addproduct(Request $request)
    {
        $product=new product();
        $this->alldata($product,$request);
        $product->save();
        return response()->json(['status'=>'product has created successfully',201]); //201 for created successfully


    }
//this function is for update
    public function updateproduct($id,Request $request)
    {
        $product=product::find($id);
        $this->alldata($product,$request);
        $product->update();
        return response()->json(['status'=>'product has updated successfully',202]); //202 for modified successfully


    }
    // this function is for delete
    public function deleteproduct($id)
    {
        $product=product::find($id)->delete();
        return response()->json(['status'=>'product has deleted successfully',200]);
    }


//make specific function to reduce duplicate code for create and update
    public function alldata($product,$request)
    {
        if ($request->isMethod('post')) {
            $data=$request->all();
            $rules=[
                'image' => 'required',
                'name' => 'required',
                'cat_id' => 'required',
                'small_description' => 'required',
                'description' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keywords' => 'required',
                'original_price' => 'required',
                'selling_price' => 'required',
                'qty' => 'required',
                'tax' => 'required',
                'status' => 'required',
                'tranding' => 'required',
            ];
            //if custom message is needed then it add to validator as 3rd perameter
            $custommessages=[
                'name.required'=>'name is required',
            ];
            $validator= Validator::make($data,$rules,$custommessages);
            if ($validator->fails()) {
                return response()->json($validator->errors(),422);
            }
            $product->image=$request->image;
            $product->name=$request->name;
            $product->cat_id=$request->cat_id;
            $product->small_description=$request->small_description;
            $product->description=$request->description;
            $product->meta_title=$request->meta_title;
            $product->meta_description=$request->meta_description;
            $product->meta_keywords=$request->meta_keywords;
            $product->original_price=$request->original_price;
            $product->selling_price=$request->selling_price;
            $product->qty=$request->qty;
            $product->tax=$request->tax;
            $product->status=$request->status==TRUE?'1':'0';
            $product->tranding=$request->tranding==TRUE?'1':'0';
        }
    }
}
