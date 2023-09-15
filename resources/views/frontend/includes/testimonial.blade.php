
    <!-- Testimonial Start -->

    <div class="demo">
    
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h6 class="text-primary text-uppercase">// Testimonial //</h6>
                    <h1 class="mb-5">Our Clients Say!</h1>
                </div>
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-slider" class="owl-carousel">
                    @foreach ($review as $view)
                        
                   
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <div class="testimonial-icon">
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <p class="description">
                              {{$view->review}}
                            </p>
                        </div>
                        <h3 class="title">{{$view->name}}</h3>
                    </div>
 
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

    <!-- Testimonial End -->
