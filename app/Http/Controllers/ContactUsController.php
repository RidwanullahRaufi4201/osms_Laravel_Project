<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{



    public function submitContactForm(Request $request)
    {
                $request->validate([
                    "name"=>"required|string|min:3|max:20",
                    "email"=>"required|email",
                    "number"=>"required|numeric|digits:10",
                    "message"=>"required|string|min:5|max:30"
                ]);

                ContactUs::insert([
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "number"=>$request->number,
                    "message"=>$request->message
                ]);

            return response()->json(['status'=>"ok"]);

    }
}
