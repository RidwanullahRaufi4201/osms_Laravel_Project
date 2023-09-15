<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class reviewController extends Controller
{
  public function submitReivew(Request $request){

                $request->validate([
                    "review"=>['required','regex:/^[\pL\s\-]+$/u','min:10','max:200'],
                    "technicain_id"=>"required",
                ]);

                 Review::insert([
                    "name"=>auth()->user()->name,
                    "review"=>$request->review,
                    "technician_id"=>$request->technicain_id
                 ]);

                 return redirect()->back()->with("reviewusubmit","Your Review Submitted Successfully!");
            
    
  }


  public function deletereview($id)
  {
                   Review::find($id)->delete();

                  return redirect()->back()->with("reviewdeleted","Review Deleted Successfully !");
  }


  public function acceptereview($id)
  {
                 $review=Review::find($id);
                 $review->review_status="accepted";
                 $review->save();
                 return redirect()->back()->with("acceptereview","Review Accepted Successfully !");

  }
}
