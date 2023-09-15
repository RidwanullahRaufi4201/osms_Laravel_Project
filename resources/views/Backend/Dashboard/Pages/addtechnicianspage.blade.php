@extends('Backend.Dashboard.Layout.master')

@section('content')
              <div class="main-content">
                 <div class="container">
                    <div class="row justify-content-center">
                        @if(session()->has('techniciansadded'))
    <div class="alert alert-success">
        {{ session()->get('techniciansadded') }}
    </div>
@endif
@if(session()->has('technicianupdated'))
<div class="alert alert-success">
    {{ session()->get('technicianupdated') }}
</div>
@endif
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-header bg-danger text-white">Add Technicians</div>
                                <div class="card-body card-block">
                                    <form @if (isset($technician))  action={{route("updatetechnicians",['id'=>$technician->id])}} @else  action="{{route("createtechnicians")}}" @endif   method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>

                                                <input type="text" id="name" @if (isset($technician)) value="{{$technician->name}}" @else value="" @endif  name="name" placeholder="name" class="form-control">
                                             
                                            </div>
                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <div class="input-group mt-2">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" id="designation" @if (isset($technician)) value="{{$technician->designation}}" @else value="" @endif  name="designation" placeholder="designation" class="form-control">
                                             
                                            </div>
                                            @error('designation')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <input type="email" id="email" @if (isset($technician)) value="{{$technician->email}}" @else value="" @endif   name="email" placeholder="Email" class="form-control">
                                              
                                            </div>
                                            @error('email')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                        
                                            
                                 
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="phone" id="phone" @if (isset($technician)) value="{{$technician->mobile}}" @else value="" @endif   name="mobile" placeholder="mobile" class="form-control">
                                            </div>
                                        </div>
                                        @error('mobile')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                               
                                 
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                                <input type="text" id="city" @if (isset($technician)) value="{{$technician->city}}" @else value="" @endif   name="city" placeholder="city" class="form-control">

                                            </div>
                                        </div>
                                        @error('city')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-image"></i>
                                            </div>
                                      
                                            <input type="file" id="image" @if (isset($technician)) value="{{$technician->image}}" @else value="" @endif   name="image" class="form-control">
                                        </div>
                                    </div>
                                    @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                            <a href={{route("showtechnicianspage")}} class="btn btn-secondary btn-sm">Back</a>

                                        </div>
                                    </form>
                                    @isset($technician)
                                    <div class="col-md-4">
                                        <img class="w-25" src="{{asset("techicians/$technician->image")}}" alt="">
                                    </div>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
              </div>
@endsection

