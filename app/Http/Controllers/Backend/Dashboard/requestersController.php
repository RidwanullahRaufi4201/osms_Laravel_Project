<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\RequestService;
use App\Models\User;
use Illuminate\Http\Request;

class requestersController extends Controller
{
         public function deleterequesters($id){
               $requester=User::find($id)->delete();
               if($requester){
                return redirect()->back()->with("requesterdeleted","Requester Deleted Successfully !");
               }else{

                return redirect()->back()->with("requesterdeleted","Error Occured In Deleting Requester !");
               }

         }



}
