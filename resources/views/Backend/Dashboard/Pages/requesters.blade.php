@extends('Backend.Dashboard.Layout.master',["page"=>$page])


@section('content')
             
         <!-- MAIN CONTENT-->
         <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                   
                  
                    <div class="row">
                        @if(session()->has('requesterdeleted'))
    <div class="alert alert-success">
        {{ session()->get('requesterdeleted') }}
    </div>
@endif
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Requesters</h3>
                            <div class="table-data__tool">
                                {{-- <div class="table-data__tool-left">
                                    <div class="rs-select2--light rs-select2--md">
                                        <select class="js-select2" name="property">
                                            <option selected="selected">All Properties</option>
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div> --}}
                                    {{-- <div class="rs-select2--light rs-select2--sm">
                                        <select class="js-select2" name="time">
                                            <option selected="selected">Today</option>
                                            <option value="">3 Days</option>
                                            <option value="">1 Week</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div> --}}
                                    {{-- <button class="au-btn-filter">
                                        <i class="zmdi zmdi-filter-list"></i>filters</button> --}}
                                </div>
                                {{-- <div class="table-data__tool-right">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        <select class="js-select2" name="type">
                                            <option selected="selected">Export</option>
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div> --}}
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
                                            <th>Joined at</th>
                                            <th>Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($requesters)
                                            
                                     @foreach ($requesters as $requester)
                                         
                               
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>{{$requester->id}}</td>
                                            <td >{{$requester->name}}</td>
                                            <td>
                                                <span class="block-email">{{$requester->email}}</span>
                                            </td>
                                         
                                            <td>{{$requester->created_at}}</td>
                                          
                                            <td>
                                                <div class="table-data-feature">
                                                
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <a href={{route("deleterequesters",['id'=>$requester->id])}} class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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