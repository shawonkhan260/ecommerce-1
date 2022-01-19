<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function editprofile(Request $request)
    {
        $profile=User::find(Auth::id());

        if ($request->hasFile('photo'))
        {
            $path="storage/photo/profile/".$profile->photo;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file=$request->file('photo');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->storeAs('public/photo/profile',$filename);
            $profile->photo=$filename;
        }
        $profile->name=$request->name;
        $profile->phone=$request->phone;
        $profile->email=$request->email;
        $profile->address=$request->address;
        if ($request->password!=NULL) {
            $request->validate(['password' => ['required', 'string', 'min:8', 'confirmed']]);
            $profile->password=Hash::make($request->password);
        }
        $profile->update();
        return redirect('profile')->with('status',"profile has updated successfully");
    }
}
