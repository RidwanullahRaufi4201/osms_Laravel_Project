<?php

namespace App\Http\Controllers;

use App\Models\RequestService;
use Illuminate\Http\Request;

class requestsController extends Controller
{
   
    public function getRequests()
    {
             $requestservice=RequestService::where("request_status","pending")->orWhere("id","asc")->get();
            
             if($requestservice){
                   return response()->json(["data"=>$requestservice]);
             }else{
                   return response()->json(['status'=>"error"]);
             }
    }


   public function getSingleRequest($id){
    $requestservice=RequestService::find($id);
    if($requestservice){
        return response()->json(["data"=>$requestservice]);
    }else{
        return response()->json(['status'=>"error"]);
        }

        
   }



   public function changeStatus($id){
    $requestservice=RequestService::find($id);
   // return response()->json(["status"=>$requestservice]);

                   $requestservice->request_status="rejected";
                   $requestservice->save();

                   return response()->json(["status"=>"ok"]);
   }
}
