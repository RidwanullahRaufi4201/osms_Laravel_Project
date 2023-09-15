@extends('Backend.Dashboard.Layout.master',['page'=>"submitrequest"])

@section('content')
          <div class="main-content">
              <div class="conainer">
                        <div class="row">
                            <div class="col-md-12">
                                @isset($pagetitle)
                                <h4 class="text-center" >{{$pagetitle}}</h4>
                            @endisset
                            </div>
                        </div>
               <div class="row justify-content-center">
                    @if(session()->has('requestservice'))
    <div class="alert alert-success">
        {{ session()->get('requestservice') }}
    </div> 
@endif
@if(session()->has('recordupdated'))
<div class="alert alert-success">
    {{ session()->get('recordupdated') }}
</div> 
@endif


                         
                    <div class="col-md-10">
                         <form  @if (isset($request)) action="{{route("updaterequestforservice",['id'=>$request->id])}}"  @else action="{{route("submitrequestforservice")}}"  @endif method="post">

                            @csrf
                              <div class="form-group">
                                <label for="">Request Info</label>
                                <input type="text" name="requestinfo" @if (isset($request)) value="{{$request->requestInfo}}"  @else value=""  @endif class="form-control">
                                @error('requestinfo')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                              </div>
                              <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control">
                                    @if (isset($request)) {{$request->requestInfo}}@else   @endif
                                </textarea>
                                @error('description')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                              </div>
                              <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name"  @if (isset($request)) value="{{$request->name}}"  @else value="{{auth()->user()->name}}" @endif  class="form-control">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                              </div>
                              <div class="form-group">
                               <div class="row">
                                <div class="col-md-6">
                                    <label for="">Address Line 1</label>
                                    <input type="text"  name="addressOne" @if (isset($request)) value="{{$request->addressOne}}"  @else value="" @endif placeholder="house:123" class="form-control">
                                    @error('addressOne')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address Line 2</label>
                                    <input type="text" name="addressTwo"  @if (isset($request)) value="{{$request->addressTwo}}"  @else value="" @endif  placeholder="sector" class="form-control">
                                    @error('addressTwo')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                               </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                 <div class="col-md-4">
                                     <label for="">City</label>
                                     <input type="text" name="city"  @if (isset($request)) value="{{$request->city}}"  @else value="" @endif  class="form-control">
                                     @error('city')
                                     <p class="text-danger">{{$message}}</p>
                                 @enderror
                                 </div>
                                 <div class="col-md-4">
                                    <label for="">State</label>
                                    <input type="text"  @if (isset($request)) value="{{$request->state}}"  @else value="" @endif  name="state"  class="form-control">
                                    @error('state')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                                 <div class="col-md-4">
                                     <label for="">Zip</label>
                                     <input type="text"  @if (isset($request)) value="{{$request->zip}}"  @else value="" @endif  name="zip" class="form-control">
                                     @error('zip')
                                     <p class="text-danger">{{$message}}</p>
                                 @enderror
                                 </div>
                                </div>
                               </div>
                               <div class="form-group">
                                <div class="row">
                                 <div class="col-md-5">
                                     <label for="">Email</label>
                                     <input type="email"  @if (isset($request)) value="{{$request->email}}"  @else value="{{auth()->user()->email}}" @endif   name="email" class="form-control">
                                     @error('email')
                                     <p class="text-danger">{{$message}}</p>
                                 @enderror
                                 </div>
                                 <div class="col-md-4">
                                     <label for="">Mobile</label>
                                     <input type="phone" name="mobile" @if (isset($request)) value="{{$request->mobile}}"  @else value="" @endif  class="form-control">
                                     @error('mobile')
                                     <p class="text-danger">{{$message}}</p>
                                 @enderror
                                 </div>
                                 <div class="col-md-3">
                                   <label for="">Date</label>
                                   <input type="date" name="date"  @if (isset($request)) value="{{$request->date}}"  @else value="" @endif class="form-control">
                                   @error('date')
                                       <p class="text-danger">{{$message}}</p>
                                   @enderror
                               </div>
                                </div>
                               </div>
                             
                               <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-success">Submit</button>
                               </div>
                               
                   </form>
                    </div>
               </div>
              </div>
          </div>
@endsection