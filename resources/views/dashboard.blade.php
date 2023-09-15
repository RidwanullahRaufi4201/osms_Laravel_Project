{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
  @extends('Backend.Dashboard.Layout.master')

  @section('content')
        <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            @can('isUser')
                                                
                                           
                                            <div class="icon">
                                                <i class="fa fa-folder"></i>
                                            </div>
                                            <div class="text">
                                                @isset($requests)
                                                <h2>{{count($requests)}}</h2>
                                                <small class="text-white">Total Requests</small>       
                                                @endisset
                                             
                                            </div>
                                            @endcan
                                            @can('isAdmin')
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                @isset($totalusers)
                                                <h2>{{$totalusers}}</h2>
                                                <small class="text-white">Total Registered Users</small>       
                                                @endisset
                                             
                                            </div>
                                            @endcan
                                        
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                @can('isUser')
                                                @isset($accepted)
                                                <h2>{{$accepted}}</h2>
                                                <span>Total Accepted</span>
                                                @endisset
                                                @endcan
                                                @can('isAdmin')
                                                @isset($accepted)
                                                <h2>{{$accepted}}</h2>
                                                <span >Total Accepted</span>
                                                @endisset
                                                @endcan
                                                
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>  
                                            
                                            </div>
                                             @can('isAdmin')
                                                 @isset($pending)   
                                            <div class="text">
                                                <h2>{{$pending}}</h2>
                                                <span>Total Pending</span>
                                            </div>
                                            @endisset
                                            @endcan
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                @can('isUser')                                          
                                                @isset($rejected)
                                                <h2>{{$rejected}}</h2>
                                                <span>Total Rejected</span>
                                                @endisset
                                                @endcan
                                                @can('isAdmin')                                          
                                                @isset($rejected)
                                                <h2>{{$rejected}}</h2>
                                                <span>Total Rejected</span>
                                                @endisset
                                                @endcan
                                                
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2>$1,060,386</h2>
                                                <span>total earnings</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>   
                                            
                                            </div>
                                             @can('isAdmin')
                                                 @isset($pending)   
                                            <div class="text">
                                                <h2>{{$pending}}</h2>
                                                <span>Total Pending</span>
                                            </div>
                                            @endisset
                                            @endcan
                                            @can('isUser')
                                            @isset($pending)   
                                       <div class="text">
                                           <h2>{{$pending}}</h2>
                                           <span>Total Pending</span>
                                       </div>
                                       @endisset
                                       @endcan
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Recent Requests</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                              
                                                <th>RequestInfo</th>
                                                <th>name</th>
                                                <th>AddressTwo</th>
                                                <th class="text-right">emai</th>
                                                <th class="text-right">Mobile</th>
                                                <th class="text-right">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @isset($requests)
                                            @foreach ($requests as $request)
                                                
                                           
                                            <tr>
                                                <td>{{$request->requestInfo}}</td>
                                                <td>{{$request->name}}</td>
                                                <td class="">{{$request->addressTwo}}</td>      
                                                <th>{{$request->email}}</th>
         
                                                <td class="text-right">{{$request->mobile}}</td>
                              
                                                <td class="text-right">{{$request->date}}</td>
                                            </tr>
                                            @endforeach
                                            @endisset

                                        </tbody>
                                    </table>
                                </div>
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