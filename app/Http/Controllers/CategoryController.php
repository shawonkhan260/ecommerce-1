<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        return view('admin.category',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category= new category();
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('photo/category',$filename);
            $category->photo=$filename;


        }
        $category->name=$request->name;
        $category->description=$request->description;
        $category->slug=$request->slug;
        $category->meta_title=$request->meta_title;
        $category->meta_description=$request->meta_description;
        $category->meta_keywords=$request->meta_keywords;
        $category->status=$request->status==TRUE?'1':'0';
        $category->popular=$request->popular==TRUE?'1':'0';
        $category->save();
        return redirect('category')->with('status',"category added successfully");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('admin.category_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        if ($request->hasFile('photo'))
        {
            $path="photo/category/".$category->photo;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file=$request->file('photo');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('photo/category',$filename);
            $category->photo=$filename;
        }
        $category->name=$request->name;
        $category->description=$request->description;
        $category->slug=$request->slug;
        $category->meta_title=$request->meta_title;
        $category->meta_description=$request->meta_description;
        $category->meta_keywords=$request->meta_keywords;
        $category->status=$request->status==TRUE?'1':'0';
        $category->popular=$request->popular==TRUE?'1':'0';
        $category->update();
        return redirect('category')->with('status',"category has updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        if ($category->photo) {
        $path="photo/category/".$category->photo;
        if (File::exists($path)) {
            File::delete($path);
            }
        }

        $category->delete();
        return redirect('category')->with('status','category has deleted successfully');
    }
    public function test(Request $request)
    {
        dd($request);
    }
}
