<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <style>
        .logo{
            width: 115px;
            display: flex;
            justify-content:center;
            align-items: center;
            margin-left: 15px;
        }
    </style>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href={{asset("frontend/lib/animate/animate.min.css")}} rel="stylesheet">
    <link href={{asset("frontend/lib/owlcarousel/assets/owl.carousel.min.css")}} rel="stylesheet">
    <link href={{asset("frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css")}} rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href={{asset("frontend/css/bootstrap.min.css")}} rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href={{asset("frontend/css/style.css")}} rel="stylesheet">
    @yield('css')
</head>

<body>
    {{-- <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End --> --}}


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>{{$setting[0]->address}}</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>{{$setting[0]->phone}}</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

@php
   $logo= $setting[0]->logo
@endphp
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a class="logo" href="{{route("dashboard")}}">
            <img
            class="logo"
            src={{asset("logo/$logo")}}
            alt="logo" />
            <strong class="">OSMS</strong>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href={{route("showhomepage")}} class="nav-item nav-link active">Home</a>
                <a href={{route("showaboutpage")}} class="nav-item nav-link">About</a>
                <a href={{route("showservicepage")}} class="nav-item nav-link">Services</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href={{route("showtechicianpage")}} class="dropdown-item">Technicians</a>
                        <a href={{route("showtestimonialpage")}} class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <a href={{route("showcontactuspage")}} class="nav-item nav-link">Contact</a>
            </div>
            @if (auth()->user())
            <form action={{route("logout")}} method="post">
                    @csrf
                <button type="submit" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"> Logout<i class="fa fa-arrow-right ms-3"></i></button>

            </form>
            @else
            <a href={{route("register")}} class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"> SignUp<i class="fa fa-arrow-right ms-3"></i></a>

            @endif
        </div>
    </nav>
    <!-- Navbar End -->


   @yield('content')

     <!-- Footer Start -->
     <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                 
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{$setting[0]->address}}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{$setting[0]->phone}}</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{$setting[0]->email1}}</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{$setting[0]->email2}}</p>

                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Monday - Friday:</h6>
                    <p class="mb-4">09.00 AM - 09.00 PM</p>
                    <h6 class="text-light">Saturday - Sunday:</h6>
                    <p class="mb-0">09.00 AM - 12.00 PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="">Diagnostic Test</a>
                    <a class="btn btn-link" href="">Engine Servicing</a>
                    <a class="btn btn-link" href="">Tires Replacement</a>
                    <a class="btn btn-link" href="">Oil Changing</a>
                    <a class="btn btn-link" href="">Vacuam Cleaning</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                      
                        <a href="{{route("register")}}" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Logout</a>

                  
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="{{route("register")}}">{{$setting[0]->websitename}}</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src={{asset("lib/wow/wow.min.js")}}></script>
    <script src={{asset("lib/easing/easing.min.js")}}></script>
    <script src={{asset("lib/waypoints/waypoints.min.js")}}></script>
    <script src={{asset("lib/counterup/counterup.min.js")}}></script>
    <script src={{asset("lib/owlcarousel/owl.carousel.min.js")}}></script>
    <script src={{asset("lib/tempusdominus/js/moment.min.js")}}></script>
    <script src={{asset("lib/tempusdominus/js/moment-timezone.min.js")}}></script>
    <script src={{asset("lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js")}}></script>

    <!-- Template Javascript -->
    <script src={{asset("js/main.js")}}></script>
    @yield('js')
</body>

</html>