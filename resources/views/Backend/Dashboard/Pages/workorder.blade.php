@extends('Backend.Dashboard.Layout.master',["page"=>$page])


@section('content')
       <!-- MAIN CONTENT-->
       <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
               
              
                <div class="row">
                    <div class="col-md-12">
                                 @if (session()->has("orderdeleted"))
                                     <h3 class="text-success text-center ">{{session()->get("orderdeleted")}}</h3>
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
                                        <th>RequestID</th>
                                        <th>RequestInfo</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Technician</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workorder  as $order)
                                        
                                  
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>{{$order->requestid}}</td>
                                        <td>
                                          {{$order->requestInfo}}
                                        </td>
                                        <td>{{$order->addressTwo}}</td>
                                        <td>{{$order->city}}</td>
                                        <td>
                                            {{$order->email}}
                                        </td>
                                        <td>{{$order->mobile}}</td>
                                        <td>
                                            @foreach ($technician as $tech)
                                                  @if ($tech->id==$order->technicain_id)
                                                      {{$tech->name}}
                                                  @endif
                                            @endforeach
                                        </td>
                                        <td>{{$order->date}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                               
                                                {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button> --}}
                                                <a href="{{route("workorder.delete",['id'=>$order->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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