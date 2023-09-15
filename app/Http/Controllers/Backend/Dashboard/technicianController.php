<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Technicain;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class technicianController extends Controller
{
    

    public function addTechnicians(){
        return view("Backend.Dashboard.Pages.addtechnicianspage")->with("page","technicians");
    }

    public function createtechnicians(Request $request){
        $request->validate([
         
            'name'=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:25','unique:'.Technicain::class],
            'designation'=>'required|regex:/^[\pL\s\-]+$/u|min:3|max:25',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Technicain::class],
            'mobile'=>"required|numeric|digits:11|unique:".Technicain::class,
            'city'=> ['required','regex:/^[\pL\s\-]+$/u','min:3','max:30'],
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
  
          ]);
        
       //   if($request->has("file")){
         //   dd($request->image);
        
         $imageName = time().'.'.$request->image->extension();  
         $request->image->move(public_path('techicians'), $imageName);
                      
          Technicain::insert([
            "name"=>$request->name,
            "designation"=>$request->designation,
            "email"=>$request->email,
            "mobile"=>$request->mobile,
            "city"=>$request->city,
            "image"=>$imageName
          ]);
     //   }


          return redirect()->back()->with("techniciansadded","Technician Added Successfully !");

    }



    public function deletetechnicians($id)
    {
                $technicians=Technicain::find($id)->delete();
                if($technicians){
                    return redirect()->back()->with("techniciandeleted","Technician Deleted Successfully !");
                }
    }


    public function edittechnicians($id){

             
        return view("Backend.Dashboard.Pages.addtechnicianspage")
                  ->with("page","technicians")
                  ->with("technician",Technicain::find($id));


    }


    public function updatetechnicians(Request $request,$id){


      
              $technician=Technicain::find($id);
              $technicianid=$technician->id;

        $request->validate([
            'name'=>['required','string','min:3','string',Rule::unique(Technicain::class)->ignore($technicianid)],
            'designation'=>"required|string|min:3|max:20",
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique(Technicain::class)->ignore($technicianid)],
            'mobile'=>["required","numeric","digits:10"],
            'city'=>"required|min:3|string" ,
            //'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
          ]);

              if($request->file("image")){
                 // unlink(public_path("techicians/$technician->image"));
                  $imagePath = public_path("techicians/{$technician->image}");

                 if (File::exists($imagePath)) {
                           File::delete($imagePath);
                      }
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('techicians'), $imageName);
                  $technician->image=$imageName;
              }
              
            $technician->name=$request->name;
            $technician->designation=$request->designation;
            $technician->email=$request->email;
            $technician->mobile=$request->mobile;
            $technician->city=$request->city;
            $technician->save();
            return redirect()->back()->with("technicianupdated","Technician Updated Successfully !");

    }



    public function getAllTechicians(){

            $technicians=Technicain::orderBy("id","asc")->get();
            if($technicians){
              return response()->json(["data"=>$technicians]);
        }else{
              return response()->json(['status'=>"error"]);
        }
    }
}
