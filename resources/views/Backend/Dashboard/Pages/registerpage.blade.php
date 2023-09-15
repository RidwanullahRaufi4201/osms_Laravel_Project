@extends('Backend.Dashboard.Layout.master')

@section('content')
              <div class="main-content">
                 <div class="container">
                    <div class="row justify-content-center">
                        @if(session()->has('newusercrated'))
    <div class="alert alert-success">
        {{ session()->get('newusercrated') }}
    </div>
@endif
@if(session()->has('userupdated'))
<div class="alert alert-success">
    {{ session()->get('userupdated') }}
</div>
@endif
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-header bg-danger text-white">Add New User</div>
                                <div class="card-body card-block">
                                    <form @if (isset($user))  action={{route("updateuser",['id'=>$user->id])}} @else  action="{{route("createnewuser")}}" @endif   method="post" class="">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" id="name" @if (isset($user)) value="{{$user->name}}" @else value="" @endif  name="name" placeholder="Username" class="form-control">
                                             
                                            </div>
                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <input type="email" id="email" @if (isset($user)) value="{{$user->email}}" @else value="" @endif   name="email" placeholder="Email" class="form-control">
                                              
                                            </div>
                                            @error('email')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                        @if (!isset($user))
                                            
                                 
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-asterisk"></i>
                                                </div>
                                                <input type="password" id="password"  name="password" placeholder="Password" class="form-control">
                                            </div>
                                        </div>
                                        @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    @endif
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <select name="user_role"     class="form-control" id="">
                                                    <option value="">select role</option>
                                                    <option value="admin" @isset($user) @if ($user->user_role=="admin") @selected(true) @else @selected(false)  @endif  @endisset >Admin</option>
                                                    <option value="user"  @isset($user) @if ($user->user_role=="user") @selected(true) @else @selected(false)  @endif  @endisset >User</option>
                                                </select>
                                            </div>
                                        </div>
                                        @error('user_role')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                            <a href={{route("showcreateuser")}}  class="btn btn-secondary btn-sm">Back</a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
              </div>
@endsection

