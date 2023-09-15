@extends('frontend.layout.app',['setting'=>$setting])

@section('title')
    Home
@endsection


@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src={{asset("frontend/img/carousel-bg-1.jpg")}} alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Repairing Service //</h6>
                                    <h1 class="display-4 text-white mb-4 pb-3 animated slideInDown">Customer's Happiness Is Our Aim</h1>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src={{asset("frontend/img/carousel-bg-2.jpg")}} alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Tools Changing Service //</h6>
                                    <h1 class="display-4 text-white mb-4 pb-3 animated slideInDown">Customer's Happiness Is Our Aim</h1>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    


     <!-- Service Start -->
     @include('frontend.includes.service')
    <!-- Service End -->


    <!-- About Start -->
    @include('frontend.includes.aboutus')

    <!-- About End -->




     <!-- Counter Start -->
     @include('frontend.includes.counter',[
        'team'=>count($team),
        "clients"=>count($users),
        "acceptedrequests"=>count($acceptedrequests)
        ]
        )

    <!-- Counter End -->




    
    <!-- Contact Us Start -->
    @include('frontend.includes.contactus')

    <!-- Contact Us End -->




    
    <!-- Team Start -->
    @include('frontend.includes.team',['team'=>$team])

    <!-- Team End -->


     {{-- Testimonial start --}}

     @include('frontend.includes.testimonial',['review'=>$review])
     {{-- Testimonial end --}}

@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
 


    <style>
        .demo{ background: #f8f8f8; }
.testimonial{
    margin: 0 20px 40px;
}
.testimonial .testimonial-content{
    padding: 35px 25px 35px 50px;
    margin-bottom: 35px;
    background: #fff;
    border: 1px solid #f0f0f0;
    position: relative;
}
.testimonial .testimonial-content:after{
    content: "";
    display: inline-block;
    width: 20px;
    height: 20px;
    background: #fff;
    position: absolute;
    bottom: -10px;
    left: 22px;
    transform: rotate(45deg);
}
.testimonial-content .testimonial-icon{
    width: 50px;
    height: 45px;
    background: #ff4242;
    text-align: center;
    font-size: 22px;
    color: #fff;
    line-height: 42px;
    position: absolute;
    top: 37px;
    left: -19px;
}
.testimonial-content .testimonial-icon:before{
    content: "";
    border-bottom: 16px solid #e41212;
    border-left: 18px solid transparent;
    position: absolute;
    top: -16px;
    left: 1px;
}
.testimonial .description{
    font-size: 15px;
    font-style: italic;
    color: #8a8a8a;
    line-height: 23px;
    margin: 0;
}
.testimonial .title{
    display: block;
    font-size: 18px;
    font-weight: 700;
    color: #525252;
    text-transform: capitalize;
    letter-spacing: 1px;
    margin: 0 0 5px 0;
}
.testimonial .post{
    display: block;
    font-size: 14px;
    color: #ff4242;
}
.owl-theme .owl-controls{
    margin-top: 20px;
}
.owl-theme .owl-controls .owl-page span{
    background: #ccc;
    opacity: 1;
    transition: all 0.4s ease 0s;
}
.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span{
    background: #ff4242;
}
JavaScript (Testimonial depend on jQuery and Owl carousel.)
    </style>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script>
    $(document).ready(function(){

       
           $("#button_send").click(function(e){
            e.preventDefault();
             
       
        var name = $("#name");
        var email = $("#email");
        var number = $("#number");
        var message = $("#message");

        // Perform validation checks
        var isValid = true;

        if (name.val().length < 3 || name.val().length > 20) {
            isValid = false;
            $('<div class=" text-white">Name must be between 3 and 20 characters</div>').insertAfter(name);
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.val())) {
            isValid = false;
            $('<div class="text-white">Enter a valid email address</div>').insertAfter(email);
        }

        if (!/^\d{10}$/.test(number.val())) {
            isValid = false;
            
            $('<div class="text-white">Number must be 10 digits</div>').insertAfter(number);
       
        }

        if (message.val().length < 5 || message.val().length > 30) {
            isValid = false;
            $('<div class="text-white">Message must be between 5 and 30 characters</div>').insertAfter(message);
        }

        if (isValid) {
            // Your AJAX request code
        



       
            var url="{{route("contactform.index")}}"
            var data = $("#formcontact").serialize();

            $.ajax({
    url: url,
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Assuming your CSRF token is stored in a meta tag
    },
    data:data,
    dataType: 'JSON',
   
    success: function (response) {
        $("#formcontact")[0].reset(); // Reset form using index instead of form variable
        $("#contactsuccess").show()
        setTimeout(() => {
            $("#contactsuccess").hide()
        }, 2000);
    },
    error: function (response) {
        // Handle error
    }
});}






           })



    $("#testimonial-slider").owlCarousel({
        items:3,
        itemsDesktop:[1000,3],
        itemsDesktopSmall:[980,2],
        itemsTablet:[768,2],
        itemsMobile:[650,1],
        pagination:true,
        navigation:false,
        slideSpeed:1000,
        autoPlay:true
    });
});
</script>
@endsection
