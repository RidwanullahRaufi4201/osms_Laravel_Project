@extends('Backend.Dashboard.Layout.master',['page'=>"allrequests"])



@section('content')
             <!-- MAIN CONTENT-->
             <div class="main-content">
               <div class="section__content section__content--p30">
                   <div class="container-fluid">
                      
                       
                       <div class="row">
                        @if(session()->has('DeleteRequest'))
    <div class="alert alert-success">
        {{ session()->get('DeleteRequest') }}
    </div>
@endif
@if(session()->has('requestnotfound'))
<div class="alert alert-success">
    {{ session()->get('requestnotfound') }}
</div>
@endif
                           <div class="col-md-12">
                               <!-- DATA TABLE -->
                               <h3 class="title-5 m-b-35">All Requests </h3>
                               
                                   
                               @isset($requests)
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
                                               <th>Request ID</th>
                                               <th>Request Info</th>
                                               <th>Address</th>
                                               <th>Status</th>
                                               <th>City</th>
                                               <th>Mobile</th>
                                               <th>Date</th>
                                               <th>Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                       
                                        @foreach ($requests as $request)
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>{{$request->id}}</td>
                                            <td>
                                                <span class="block-email">{{$request->requestInfo}}</span>
                                            </td>
                                            <td>{{$request->addressTwo}}</td>
                                            <td>
                                                <span class="status--process">{{$request->request_status}}</span>
                                            </td>
                                            <td>{{$request->city}}</td>

                                            <td>{{$request->mobile}}</td>
                                            <td>{{$request->date}}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                   
                                                    <a href="{{route("editrequestforservice",["id"=>$request->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a href="{{route("deleterequest",["id"=>$request->id])}}" class="item btn-delete" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                  
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                      
                                     
                                       </tbody>
                                   </table>
                                   @endisset
                                   
                            
                                         
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






  
  
  
  