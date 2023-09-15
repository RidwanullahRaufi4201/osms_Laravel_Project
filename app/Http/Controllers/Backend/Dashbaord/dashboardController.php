<?php

namespace App\Http\Controllers\Backend\Dashbaord;

use App\Http\Controllers\Controller;
use App\Models\AssignWork;
use App\Models\RequestService;
use App\Models\Review;
use App\Models\Technicain;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
      public function workorderpage()
      {
                    
        return view("Backend.Dashboard.Pages.workorder")
               ->with("page","workorder")
               ->with("workorder",AssignWork::all())
               ->with("technician",Technicain::all());
      }
      public function requestspage()
      {
        return view("Backend.Dashboard.Pages.requests")
               ->with("page","requests");
      }
      public function technicianspage()
      {
                   // dd(Technicain::all());
        return view("Backend.Dashboard.Pages.technicians")
               ->with("page","technicians")
               ->with("technicians",Technicain::all());
      }
      public function requesterspage()
      {
                $requesters=User::where("user_role","user")->get();
                //dd($requesters);
        return view("Backend.Dashboard.Pages.requesters")
               ->with("page","requesters")
               ->with("requesters",$requesters);
      }
      public function selfreportpage()
      {
        return view("Backend.Dashboard.Pages.selfreport")
               ->with("page","selfreport");
      }
      public function workreportpage()
      {
        return view("Backend.Dashboard.Pages.workreport")
               ->with("page","workreport");
      }



      public function profilepage()
      {
        return view("Backend.Dashboard.Pages.User.profile")
               ->with("page","profile");
      }
      public function submitrequestpage()
      {
        return view("Backend.Dashboard.Pages.User.submitrequest")
               ->with("page","submitrequest")
               ->with("pagetitle","Request For Service");
      }
      public function allrequestspage()
      {
        return view("Backend.Dashboard.Pages.User.allrequests")
               ->with("page","allrequests")
               ->with("requests",RequestService::where("user_id",auth()->user()->id)->paginate(4));
      }

      public function requeststatuspage()
      {
        return view("Backend.Dashboard.Pages.User.requeststatus")
               ->with("page","requeststatus");
      }



      public function createuser()
      {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view("Backend.Dashboard.Pages.adduserpage")
               ->with("page","adduserpage")
               ->with("allusers",$users);
      }
      public function reviewourservice()
      {
               $works=AssignWork::where("requester_id",auth()->user()->id)->get();
               $technicainid=[];
               foreach($works as $work){
                     array_push($technicainid,$work->technicain_id);
               }
               $servetechnicain=Technicain::find($technicainid);
              // dd($servetechnicain);




        return view("Backend.Dashboard.Pages.User.reviewtoourservice")
               ->with("page","review")
               ->with("technician",$servetechnicain);
      }



      public function checkreview(){

       return view("Backend.Dashboard.Pages.reviews")
                    ->with("page","checkreview")
                    ->with("review",Review::where("review_status","pending")->get());

      }
      public function settings()
      {
        return view("Backend.Dashboard.Pages.settings.index")
               ->with("page","settings");
      }
   
}
