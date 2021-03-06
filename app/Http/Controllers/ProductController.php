<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        $categorys=Category::all();
        return view('admin.product',compact('products','categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',
            'image.*' => 'mimes:jpg,png,jpeg,gif,svg'
            ]);
        $product=new Product();
        if($request->hasFile('image'))
        {
            foreach($request->file('image') as $file)
            {
            //$file=$request->file('image');
            //$ext=$file->getClientOriginalExtension();
            //$filename=time().'.'.$ext;
            $original=$file->getClientOriginalName();
            $filename=time().$original;
            $file->storeAs('public/photo/product',$filename);
            $imagedata[]=$filename;
            }


        }
        $product->image=json_encode($imagedata);
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
        $product->save();
        return redirect('product')->with('status',"product added successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $categorys=Category::all();

        return view('admin.product_edit',compact('product','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        // if ($request->hasFile('image'))
        // {
        //     $path="storage/photo/product/".$product->image;
        //     if (File::exists($path)) {
        //         File::delete($path);
        //     }
        //     $file=$request->file('image');
        //     $ext=$file->getClientOriginalExtension();
        //     $filename=time().'.'.$ext;
        //     $file->storeAs('public/photo/product',$filename);
        //     $product->image=$filename;
        // }

        if($request->hasFile('image'))
        {
            $images=json_decode($product->image);
            for ($i=0;$i<count($images);$i++ )
            {
            $path="storage/photo/product/".$images[$i];
            if (File::exists($path)) {
                     File::delete($path);
                }
            }
            foreach($request->file('image') as $file)
            {

            $original=$file->getClientOriginalName();
            $filename=time().$original;
            $file->storeAs('public/photo/product',$filename);
            $imagedata[]=$filename;
            }
        $product->image=json_encode($imagedata);

        }
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
        $product->update();
        return redirect('product')->with('status',"product has updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        if ($product->image) {
            $images=json_decode($product->image);
            for ($i=0;$i<count($images);$i++ )
            {
            $path="storage/photo/product/".$images[$i];
            if (File::exists($path)) {
                     File::delete($path);
                }
            }

        }
        $product->delete();
        return redirect('product')->with('status',"product deleted successfully");

    }
}
