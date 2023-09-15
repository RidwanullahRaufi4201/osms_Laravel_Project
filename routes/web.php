<?php

use App\Http\Controllers\Backend\Dashbaord\dashboardController;
use App\Http\Controllers\Backend\Dashboard\requestersController;
use App\Http\Controllers\Backend\Dashboard\technicianController;
use App\Http\Controllers\Backend\Dashboard\User\submitRequestController;
use App\Http\Controllers\Backend\Dashboard\userController;
use App\Http\Controllers\Backend\User\reviewController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\requestsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\workOrderController;
use App\Models\RequestService;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[frontendController::class,"showhomepage"])->name("showhomepage");
Route::get("showaboutpage",[frontendController::class,"showaboutpage"])->name("showaboutpage");
Route::get("showservicepage",[frontendController::class,"showservicepage"])->name("showservicepage");
Route::get("showcontactuspage",[frontendController::class,"showcontactuspage"])->name("showcontactuspage");
Route::get("showtechicianpage",[frontendController::class,"showtechicianpage"])->name("showtechicianpage");
Route::get("showtestimonialpage",[frontendController::class,"showtestimonialpage"])->name("showtestimonialpage");



Route::post("submitcontact",[ContactUsController::class,"submitContactForm"])->name("contactform.index");

Route::get('/dashboard', function () {
               if(auth()->user()->user_role=="admin"){
                                 
                            
                                  $totalAccepted=RequestService::where("request_status","accepted")->get();
                                  $totalRjected=RequestService::where("request_status","rejected")->get();
                                  $totalPending=RequestService::where("request_status","pending")->get();
                                  $totalusers=User::where("user_role","user")->get();

                        return view('dashboard',['page'=>"dashboard","accepted"=>count($totalAccepted),"rejected"=>count($totalRjected),"pending"=>count($totalPending),"totalusers"=>count($totalusers)])->with("requests",RequestService::paginate(5));
               }else if(auth()->user()->user_role=="user"){
                $requestservice=RequestService::where("user_id",auth()->user()->id)->get();
             //dd($requestservice);
             $totalAccepted=0;
             $totalPending=0;
             $totalRjected=0;
                if(count($requestservice)>0)
                {
                    foreach($requestservice as $service){
                               if($service->request_status=="pending"){
                                       $totalPending++;
                               }else if($service->request_status=="accepted"){
                                 $totalAccepted++;
                               }else if($service->request_status=="rejected"){
                                 $totalRjected++;
                               }
                    }
                    return view('dashboard',['page'=>"dashboard","accepted"=>$totalAccepted,"rejected"=>$totalRjected,"pending"=>$totalPending])->with("requests",RequestService::where("user_id",auth()->user()->id)->paginate(4));

                }else{
                    return view('dashboard',['page'=>"dashboard","accepted"=>$totalAccepted,"rejected"=>$totalRjected,"pending"=>$totalPending])->with("requests",RequestService::where("user_id",auth()->user()->id)->paginate(4));

                }


               }
   
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::middleware("can:isAdmin")->group(function(){
    //DashboardPage Routes
    Route::get("checkreview",[dashboardController::class,"checkreview"])->name("checkreview");
    Route::get("deletereview/{id}",[reviewController::class,"deletereview"])->name("deletereview");
    Route::get("acceptereview/{id}",[reviewController::class,"acceptereview"])->name("acceptereview");




    Route::post("submitsetting",[SettingController::class,"submitsetting"])->name("submitsetting");
    Route::get("showworkorderpage",[dashboardController::class,"workorderpage"])->name("showworkorderpage");
    Route::get("showrequestspage",[dashboardController::class,"requestspage"])->name("showrequestspage");
    Route::get("showtechnicianspage",[dashboardController::class,"technicianspage"])->name("showtechnicianspage");
    Route::get("showrequesterspage",[dashboardController::class,"requesterspage"])->name("showrequesterspage");
    Route::get("showselfreportpage",[dashboardController::class,"selfreportpage"])->name("showselfreportpage");
    Route::get("showworkreportpage",[dashboardController::class,"workreportpage"])->name("showworkreportpage");

    Route::get("showcreateuser",[dashboardController::class,"createuser"])->name("showcreateuser");
    Route::get("showsettingspage",[dashboardController::class,"settings"])->name("showsettingspage");
    Route::get("showregisteruserpage",[userController::class,"registerUser"])->name("registernewuser");
    Route::post("createnewuser",[userController::class,"createnewUser"])->name("createnewuser");
    Route::get("deleteuser/{id}",[userController::class,"deleteuser"])->name("deleteuser");
    Route::get("edituser/{id}",[userController::class,"edituser"])->name("edituser");
    Route::post("updateuser/{id}",[userController::class,"updateuser"])->name("updateuser");
    Route::get("addtechnicians",[technicianController::class,"addtechnicians"])->name("addtechnicians");
    Route::post("createtechnicians",[technicianController::class,"createtechnicians"])->name("createtechnicians");
    Route::get("deletetechnicians/{id}",[technicianController::class,"deletetechnicians"])->name("deletetechnicians");
    Route::get("edittechnicians/{id}",[technicianController::class,"edittechnicians"])->name("edittechnicians");
    Route::post("updatetechnicians/{id}",[technicianController::class,"updatetechnicians"])->name("updatetechnicians");

    Route::get("deleterequesters/{id}",[requestersController::class,"deleterequesters"])->name("deleterequesters");

    Route::get("gettechnicians",[technicianController::class,"getAllTechicians"])->name("getAllTechicians");
    Route::get("getrequests",[requestsController::class,"getRequests"])->name("getusersrequest.index");
    Route::get("getsinglerequest/{id}",[requestsController::class,"getSingleRequest"])->name("getSingleRequest.index");
    Route::get("changeStatus/{id}",[requestsController::class,"changeStatus"])->name("changeStatus.index");

    Route::post("asignwork",[workOrderController::class,"assignWork"])->name("assignWork");
    Route::get("deleteworkorder/{id}",[workOrderController::class,"deleteOrder"])->name("workorder.delete");

});

     

Route::middleware("can:isUser")->group(function(){

  // User Routes
//   Route::get("showprofilepage",[dashboardController::class,"profilepage"])->name("profilepage");
  Route::get("showsubmitrequestpage",[dashboardController::class,"submitrequestpage"])->name("submitrequestpage");
  Route::get("showallrequestspage",[dashboardController::class,"allrequestspage"])->name("allrequestspage");
  Route::get("requeststatus",[dashboardController::class,"requeststatuspage"])->name("requeststatuspage");
  Route::get("review",[dashboardController::class,"reviewourservice"])->name("reviewourservice");
  
  Route::post("submitreview",[reviewController::class,"submitReivew"])->name("submitReivew");
   Route::post("submitrequestforservice",[submitRequestController::class,"storeRequestService"])->name("submitrequestforservice");

   Route::post("checkrequeststatus",[submitRequestController::class,"checkRequestStatus"])->name("checkrequeststatus");
   Route::get("deleterequest/{id}",[submitRequestController::class,"deleteRequest"])->name("deleterequest");
   Route::get("editrequestforservice/{id}",[submitRequestController::class,"editRequestService"])->name("editrequestforservice");
   Route::post("updaterequestforservice/{id}",[submitRequestController::class,"updateRequestService"])->name("updaterequestforservice");



});
  





});

require __DIR__.'/auth.php';
