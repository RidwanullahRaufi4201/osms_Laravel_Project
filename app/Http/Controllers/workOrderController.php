<?php

namespace App\Http\Controllers;

use App\Models\AssignWork;
use App\Models\RequestService;
use Illuminate\Http\Request;

class workOrderController extends Controller
{

    public function assignWork(Request $request)
    {

    
                $request->validate([
                    "requestid"=>"required|min:1|max:4",
                    "requestinfo"=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:30'],
                    "Description"=>['required','regex:/^[\pL\s\-]+$/u','min:8','max:50'],
                    "name"=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:30'],
                    "addressone"=>"required|string|min:2|max:10",
                    "addresstwo"=>"required|string|min:3|max:10",
                    "city"=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:30'],
                    "state"=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:20'],
                    "zip"=>"required|integer|digits:4",
                    "email" =>['required', 'string', 'email', 'max:255'],
                    "mobile"=>'required|numeric|digits:11',
                    "technicianid"=>"required|integer",
                    "date"=>"required|date",
                ]);



             // dd($request->all());
            
            $assignwork=AssignWork::insert([
                "requestid"=>$request->requestid,
                "requestInfo"=>$request->requestinfo,
                "description"=>$request->Description,
                "requestername"=>$request->name,
                "requester_id"=>$request->user_id,
                "addressOne"=>$request->addressone,
                "addressTwo"=>$request->addresstwo,
                "city"=>$request->city,
                "state"=>$request->state,
                "zip"=>$request->zip,
                "email"=>$request->email,
                "mobile"=>$request->mobile,
                "date"=>$request->date,
                "technicain_id"=>$request->technicianid
            ]);
            if($assignwork){
                   $requestservice=RequestService::find($request->requestid);
                   $requestservice->request_status="accepted";
                   $requestservice->save();
                return redirect()->back()->with("assigned","Request Assigned To Technician Sucessfully !");
            }else{
                return redirect()->back()->with("assigned","Error Occured  !");
                
            }

    }


    public function deleteOrder($id)
    {
               $workorder=assignWork::find($id)->delete();
               if($workorder){
                return redirect()->back()->with("orderdeleted","WorkOrder Deleted Successfully !");
                   }else{
                    return redirect()->back()->with("orderdeleted","Error Occurd !");

                   }
    }
}
