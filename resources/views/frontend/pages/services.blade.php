@extends('frontend.layout.app')

@section('content')
      <!-- Page Header Start -->
      <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{asset("frontend/img/carousel-bg-2.jpg")}});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


     <!-- Service Start -->
     @include('frontend.includes.service')
    <!-- Service End -->


      
    <!-- Contact Us Start -->
    @include('frontend.includes.contactus')

    <!-- Contact Us End -->



      {{-- Testimonial start --}}

      @include('frontend.includes.testimonial')
      {{-- Testimonial end --}}

@endsection