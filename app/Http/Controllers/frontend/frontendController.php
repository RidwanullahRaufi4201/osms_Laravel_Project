<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\RequestService;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Technicain;
use Illuminate\Http\Request;
use App\Models\User;

class frontendController extends Controller
{
   public function showhomepage()
   {
             $user=User::where("user_role","user")->get();
             $acceptedrequests=RequestService::where("request_status","accepted")->get();
            
    return view("frontend.pages.home")
             ->with("team",Technicain::all())
             ->with("users",$user)
             ->with("acceptedrequests",$acceptedrequests)
             ->with("review",Review::where("review_status","accepted")->get())
             ->with("setting",Setting::all());
   }
   public function showaboutpage()
   {
    return view("frontend.pages.about")
           ->with("setting",Setting::all());
   }
   public function showservicepage()
   {
    return view("frontend.pages.services")
           ->with("review",Review::all())
           ->with("setting",Setting::all());
   }
   public function showcontactuspage()
   {
    return view("frontend.pages.contactus")
    ->with("setting",Setting::all());
   }
   public function  showtechicianpage()
   {
    return view("frontend.pages.technician")
          ->with("setting",Setting::all())
          ->with("team",Technicain::all());;
   }
   public function  showtestimonialpage()
   {
    return view("frontend.pages.testimonial")
               ->with("setting",Setting::all())
               ->with("review",Review::all());
   }
 
}
