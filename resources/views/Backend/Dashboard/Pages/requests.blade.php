@extends('Backend.Dashboard.Layout.master',["page"=>$page])


@section('content')
        <div class="main-content">
            <div class="container">
                <div class="row">
                       <div class="col-md-12">
                        <p id="injectrejectedmessage" style="display: none;color:red;margin-top:4px;margin-buttom:4px; text-align:center">Request Rejected Successfully !</p>
                        <p id="notrequestmessage" style="display: none;color:black;margin-top:4px;margin-buttom:4px; text-align:center; font-size:22px">No Request Has Been Made !</p>


                       </div>
                    @if (session()->has("assigned"))
                        <div class="col-md-12">
                           
                            <p class="text-success text-center my-2">{{session()->get("assigned")}}</p>
                        </div>
                    @endif
                    <div class="col-md-5" id="injectcards">
                        {{-- <div class="card p-3">
                            <div class="card-header">
                               Request ID:23
                            </div>
                            <div class="card-header">
                                Request Info: Ic not working
                            </div>
                            <div class="card-body">
                                fjdalkfjalkdfjldakj
                            </div>
                            <div>
                                Date:32532
                            </div>
                              <div class="text-right">
                                 <button class="btn btn-sm btn-danger">View</button>
                                 <button class="btn btn-sm btn-secondary">Close</button>
                              </div>
                          </div> --}}
                    </div>
                    <div class="col-md-5" id="assignworkform">
                           <form action="{{route("assignWork")}}" method="post">
                            @csrf
                                      <div class="form-group">
                                        <label for="">Request ID</label>
                                        <input type="text" name="requestid" id="requestid" class="form-control">
                                        @error('requestid')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                      </div>
                                      <div class="form-group">
                                        <label for="">Request Info</label>
                                        <input type="text" name="requestinfo" id="requestinfo" class="form-control">
                                        @error('requestinfo')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                      </div>
                                      <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" name="Description" id="Description"  class="form-control">
                                        @error('Description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                      </div>
                                      <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name"  id="name" class="form-control">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        <input type="hidden" name="user_id"  id="user_id" class="form-control">

                                      </div>
                                      <div class="form-group">
                                       <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Address One</label>
                                            <input type="text" name="addressone" id="addressone" class="form-control">
                                            @error('addressone')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Adress Two</label>
                                            <input type="text" name="addresstwo" id="addresstwo" class="form-control">
                                            @error('addresstwo')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                       </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="row">
                                         <div class="col-md-4">
                                             <label for="">City</label>
                                             <input type="text" name="city" id="city" class="form-control">
                                             @error('city')
                                             <p class="text-danger">{{$message}}</p>
                                             @enderror
                                         </div>
                                         <div class="col-md-4">
                                            <label for="">State</label>
                                            <input type="text" name="state" id="state" class="form-control">
                                            @error('state')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                         <div class="col-md-4">
                                             <label for="">Zip</label>
                                             <input type="text" name="zip" id="zip" class="form-control">
                                             @error('zip')
                                             <p class="text-danger">{{$message}}</p>
                                             @enderror
                                         </div>
                                        </div>
                                       </div>
                                       <div class="form-group">
                                        <div class="row">
                                         <div class="col-md-8">
                                             <label for="">Email</label>
                                             <input type="email" name="email" id="email" class="form-control">
                                             @error('email')
                                             <p class="text-danger">{{$message}}</p>
                                             @enderror
                                         </div>
                                         <div class="col-md-4">
                                             <label for="">Mobile</label>
                                             <input type="phone" name="mobile" id="mobile" class="form-control">
                                             @error('mobile')
                                             <p class="text-danger">{{$message}}</p>
                                             @enderror
                                         </div>
                                        </div>
                                       </div>
                                       <div class="form-group">
                                        <div class="row">
                                         <div class="col-md-7">
                                             <label for="">Assign To Technician</label>
                                             <select name="technicianid" class="form-control" id="injecttechnicians">
                                                      <option value="">Select Technician</option>
                                             </select>
                                             @error('technicianid')
                                             <p class="text-danger">{{$message}}</p>
                                             @enderror
                                         </div>
                                         <div class="col-md-5">
                                             <label for="">Date</label>
                                             <input type="date" name="date" class="form-control">
                                             @error('date')
                                             <p class="text-danger">{{$message}}</p>
                                             @enderror
                                         </div>
                                        </div>
                                       </div>
                                       <div class="text-right">
                                        <button type="submit" class="btn btn-sm btn-success">Assign</button>
                                        <button class="btn btn-sm btn-secondary">Reset</button>
                                       </div>
                                       
                           </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script>
           $(document).ready(function(){

            
            $.ajax({
    url: "{{ route('getAllTechicians') }}",
    method: "GET",
    success: function(resp){
        $.each(resp['data'],function(index,value){
                $("#injecttechnicians").append(`
                <option value="${value.id}">${value.name}</option> 
                `)
               
        })
    },
    error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
    }
})


function getUsersRequests(){

            $.ajax({
    url: "{{ route('getusersrequest.index') }}",
    method: "GET",
    data: {id: 1},
    success: function(resp){
           var length=resp['data'].length
                  if(length==0){
                    $("#notrequestmessage").show()
                    $("#injectcards").hide()
                    $("#assignworkform").hide()

                  
                  }else{
                    $("#notrequestmessage").hide()
                    $("#injectcards").show()
                    $("#assignworkform").show()
          $.each(resp['data'],function(index,value){
                  $("#injectcards").append(`
                  <div class="card p-3">
                            <div class="card-header">
                              Request ID:${value.id}
                            </div>
                            <div class="card-header">
                                Request Info: ${value.requestInfo}
                            </div>
                            <div class="card-body">
                                 ${value.description}
                            </div>
                            <div>
                                Date:${value.date}
                            </div>
                              <div class="text-right">
                                 <button type="button" class="btn btn-sm btn-danger view-button  "   data-requestid=${value.id}>View</button>
                                 <button type="button"  class="btn btn-sm btn-secondary close-button"   data-requestid=${value.id}>Reject</button>
                              </div>
                          </div> 
                  `) 
          })
            

    }
},
    error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
    }
})
}

getUsersRequests()


      

            
$(document).on("click", ".close-button", function(e){
             
             const requestId = $(this).data("requestid");
           //  alert(requestId)
             var url= "{{ route('changeStatus.index',":id") }}";
            url= url.replace(":id",requestId)
             $.ajax({
             url:url,
             method: "GET",
             success: function(resp){
                      if(resp['status']){
                        $("#injectrejectedmessage").show()
                       setTimeout(() => {
                        location.reload();
                       }, 1000);
                       
                      }
             },
             error: function (xhr, ajaxOptions, thrownError) {
                 console.log(xhr.status);
                     console.log(thrownError);
                }
                    })
         });






         $(document).on("click", ".view-button", function(e){
                const requestId = $(this).data("requestid");
                var url="{{ route('getSingleRequest.index',":id") }}"
                url=url.replace(":id",requestId)
                $.ajax({
    url: url,
    method: "GET",

    success: function(resp){

            $("#requestid").val(resp['data'].id)
            $("#requestinfo").val(resp['data'].requestInfo)
            $("#Description").val(resp['data'].description)
            $("#name").val(resp['data'].name)
            $("#user_id").val(resp['data'].user_id)

            $("#addressone").val(resp['data'].addressOne)
            $("#addresstwo").val(resp['data'].addressTwo)
            $("#city").val(resp['data'].city)
            $("#state").val(resp['data'].state)
            $("#zip").val(resp['data'].zip)
            $("#email").val(resp['data'].email)
            $("#mobile").val(resp['data'].mobile)
        

    },
    error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
    }
})


            });


           })
    </script>
@endsection