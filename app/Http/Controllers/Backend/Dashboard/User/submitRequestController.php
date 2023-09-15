<?php

namespace App\Http\Controllers\Backend\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\RequestService;
use Illuminate\Http\Request;
use App\Models\User;

class submitRequestController extends Controller
{
    public function storeRequestService(Request $request)
    {
            $request->validate([
                "requestinfo"=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:30'],
                "description"=>['required','regex:/^[\pL\s\-]+$/u','min:8','max:200'],
                "name"=>   ['required','regex:/^[\pL\s\-]+$/u','min:3','max:30'],
                "addressOne"=>"required|string|min:2|max:10",
                "addressTwo"=>"required|string|min:3|max:10",
                "city"=>   ['required','regex:/^[\pL\s\-]+$/u','min:3','max:30'],
                "state"=>   ['required','regex:/^[\pL\s\-]+$/u','min:3','max:20'],
                "zip"=>"required|integer|digits:4",
                "email" => ['required', 'string', 'email', 'max:255'],
                "mobile"=>'required|numeric|digits:11',
                "date"=>"required|date",
            ]);
       


            RequestService::insert([
                "requestinfo"=>$request->requestinfo,
                "description"=>$request->description,
                "name"=>$request->name,
                "addressOne"=>$request->addressOne,
                "addressTwo"=>$request->addressTwo,
                "city"=>$request->city,
                "state"=>$request->state,
                "zip"=>$request->zip,
                "email"=>$request->email,
                "mobile"=>$request->mobile,
                "date"=>$request->date,
                "user_id"=>auth()->user()->id,
            ]);

            return redirect()->back()->with("requestservice","Your Request for Service Submitted Successfully");
    }



    public function checkRequestStatus(Request $request)
    {
              $request->validate([
                "requestid"=>'required|numeric|min:1|max:1000'
              ]);

               $requestservice=RequestService::where("user_id",auth()->user()->id)->find($request->requestid);
               if($requestservice){
              //  dd($requestservice->request_status=="accepted");
                     if($requestservice->request_status=="pending"){
                        return redirect()->back()->with("requeststatus","Your Request Is Still In Pending ");
                     }else if($requestservice->request_status=="accepted"){
                        return redirect()->back()->with("requeststatus","Your Request Has Been Accepted");
                     }else if($requestservice->request_status=="rejected"){
                        return redirect()->back()->with("requeststatus","Unluckily, Your Request Has Been Rejected");

                     }
                    // return redirect()->back()->with("requeststatus","Sorry,This Request didnt exist ");

               }else{
                return redirect()->back()->with("requeststatus","Sorry,This Request didnt exist ");
               }
    }



    public function deleteRequest($id)
    {
            $requestservice=RequestService::find($id)->delete();
            if($requestservice){
                return  redirect()->back()->with("DeleteRequest","Record Deleted Successfully !");
            }else{
                return redirect()->back()->with("DeleteRequest","Error ocured while Deleting Record !");
           
            }
    }


    public function editRequestService($id)
    {
        $requestservice=RequestService::find($id);
        if($requestservice){
            return view("Backend.Dashboard.Pages.User.submitrequest")
                       ->with("request",$requestservice)
                       ->with("page","Edit Request")
                       ->with("pagetitle","Edit Request");
        }else{
         return redirect()->back()->with("requestnotfound","Sorry,This Request didnt exist ");
        }
              
    }



    public function updateRequestService(Request $request,$id){
        $request->validate([
            "requestinfo"=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:30'],
            "description"=>['required','regex:/^[\pL\s\-]+$/u','min:8','max:50'],
            "name"=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:30'],
            "addressOne"=>"required|string|min:2|max:10",
            "addressTwo"=>"required|string|min:3|max:10",
            "city"=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:30'],
            "state"=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:20'],
            "zip"=>"required|integer|digits:4",
            "email" =>['required', 'string', 'email', 'max:255'],
            "mobile"=>'required|numeric|digits:11',
            "date"=>"required|date",
        ]);
        $requestservice=RequestService::find($id);
        
            $requestservice->requestinfo=$request->requestinfo;
            $requestservice->description=$request->description;
            $requestservice->name=$request->name;
            $requestservice->addressOne=$request->addressOne;
            $requestservice->addressTwo=$request->addressTwo;
            $requestservice->city=$request->city;
            $requestservice->state=$request->state;
            $requestservice->zip=$request->zip;
            $requestservice->email=$request->email;
            $requestservice->mobile=$request->mobile;
            $requestservice->date=$request->date;
            $requestservice->save();
            return redirect()->back()->with("recordupdated","Your Request Updated Successfully !");
          //  $requestservice->user_id=auth()->user()->id;
       



    }
}
