@extends('Backend.Dashboard.Layout.master')

@section('content')
     <!-- MAIN CONTENT-->
     <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
               
              
                <div class="row">
                    <div class="col-md-12">
                                 @if (session()->has("reviewdeleted"))
                                     <h3 class="text-success text-center ">{{session()->get("reviewdeleted")}}</h3>
                                 @endif
                                 @if (session()->has("acceptereview"))
                                 <h3 class="text-success text-center ">{{session()->get("acceptereview")}}</h3>
                             @endif
                        <!-- DATA TABLE -->
                        <h3 class="title-5 m-b-35">Technicians</h3>
                        <div class="table-data__tool">
                         
                            </div>
                     
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
                                        <th>Id</th>
                                        <th>Review</th>
                                        <th>Name</th>
                                     
                                     
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($review  as $view)
                                        
                                  
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>{{$view->id}}</td>
                                        <td>
                                          {{$view->review}}
                                        </td>
                                        <td>{{$view->name}}</td>
                                       
                                    
                                        <td>{{$view->review_status}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                               
                                                <a href="{{route("acceptereview",['id'=>$view->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="{{route("deletereview",['id'=>$view->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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