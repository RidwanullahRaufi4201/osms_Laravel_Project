@extends('Backend.Dashboard.Layout.master',['page'=>"settings"]);

@section('content')
    <div class="main-content">
                 <div class="container">
                    <div class="row justify-content-center">
                          <div class="col-md-12">
                                        @if (session()->has("settingsubmit"))
                                            <p class="text-success text-center">{{session()->get("settingsubmit")}}</p>
                                        @endif
                          </div>
                        <div class="col-md-10">
                             <h4 class="text-center">Setting</h4>
                        </div>
                        <div class="col-md-8">
                                  <form action={{route("submitsetting")}} method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Website Name</label>
                                        <input type="text" class="form-control" name="websitename">
                                        @error('websitename')
                                             <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Logo</label>
                                        <input type="file" class="form-control" name="logo">
                                        @error('logo')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" name="address">
                                        @error('address')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" name="phone">
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">email</label>
                                        <input type="text" class="form-control" name="email1">
                                        @error('email1')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">email</label>
                                        <input type="text" class="form-control" name="email2">
                                        @error('email2')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                     
                                        <input type="submit" value="submit" class="btn btn-sm btn-danger" >
                                    </div>
                                  </form>
                        </div>
                    </div>
                 </div>
    </div>
@endsection