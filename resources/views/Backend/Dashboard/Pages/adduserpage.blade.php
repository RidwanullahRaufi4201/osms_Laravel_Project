@extends('Backend.Dashboard.Layout.master',['page'=>"adduserpage"]);


@section('content')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       
                      
                        <div class="row">
                            @if(session()->has('userdeleted'))
    <div class="alert alert-success">
        {{ session()->get('userdeleted') }}
    </div>
@endif
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">All Users</h3>
                                <div class="table-data__tool-right text-right">
                                    <a href="{{route("registernewuser")}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>Add User</a>
                                  
                                </div>
                              
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($allusers)
                                                
                                       
                                            @foreach ($allusers as $user)
                                                
                                          
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>{{$user->id}}</td>
                                           
                                                <td >{{$user->name}}</td>
                                                <td>
                                                    <span class="block-email">{{$user->email}}</span>
                                                </td>
                                                <td>{{$user->user_role}}</td>
                                              
                                                <td>
                                                    <div class="table-data-feature">
                                                     
                                                        <a href="{{route("edituser",['id'=>$user->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="{{route("deleteuser",['id'=>$user->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                      
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection