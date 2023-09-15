<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{


    public function submitsetting(Request $request)
    {
           $request->validate([
            "websitename"=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:15'],
            'logo'=>'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            "address"=>"required|string|min:5|max:30",
            "phone"=>"required|numeric|digits:11",
            "email1"=>"required|email",
            "email2"=>"required|email"
           ]);

           //dd($request->all());
           if($request->file("logo")){
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('logo'), $imageName);

            Setting::insert([
                "websitename"=>$request->websitename,
                "logo"=>$imageName,
                "address"=>$request->address,
                "phone"=>$request->phone,
                "email1"=>$request->email1,
                "email2"=>$request->email2
            ]);

            return redirect()->back()->with("settingsubmit","Setting Submitted Successfully !");
           }

          
    }
}
