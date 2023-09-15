<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
class userController extends Controller
{
    public function registerUser()
    {
        return view("Backend.Dashboard.Pages.registerpage")->with("page","registerpage");
    }


    public function createnewUser(Request $request)
    {
          $request->validate([
         
            'name'=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:30','unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password'=>'required|min:8',
            'user_role'=>"required"
          ]);

          User::insert(
            [
                "name"=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'user_role'=>$request->user_role
            ]);
             
               $userrole=strtoupper( $request->user_role);
               

            return redirect()->back()->with("newusercrated","New $userrole Added Successfully 1");
    }



    public function deleteuser($id)
    {
           $deleteduser=User::find($id)->delete();
           if($deleteduser){
            return redirect()->back()->with("userdeleted","User Deleted Successfully !");
           }else{
            return redirect()->back()->with("userdeleted","Error Occured in Deleting User !");

           }
    }


    public function edituser($id)
    {
      return view("Backend.Dashboard.Pages.registerpage")
            ->with("page","registerpage")
            ->with("user",User::find($id));

    }


    public function updateuser(Request $request,$id)
    {
        $userid=User::find($id);
        $userid=$userid->id;
      
      
            $request->validate([
              'name'=>['required','regex:/^[\pL\s\-]+$/u','min:3','max:30',Rule::unique(User::class)->ignore($userid)],
              'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($userid)],
              'user_role'=>"required"
            ]);

            $user=User::find($id);
            $mayprerole=$user->user_role;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->user_role=$request->user_role;
            $user->save();


            return redirect()->back()->with("userupdated","$mayprerole Updated Successfully !");
        
         
               
    }
}
