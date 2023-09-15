 <!-- Contact Us Start -->
 <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-6 py-5">
                <div class="py-5">
                    <h1 class="text-white mb-4">Certified and Award Winning  Repair Service Provider</h1>
                    <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                </div>
            </div>
            
            <div class="col-lg-6">
               
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Contact Us</h1>
                    <form  id="formcontact">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" name="name" id="name" placeholder="Your Name" style="height: 55px;">
                             
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" name="email" id="email" placeholder="Your Email" style="height: 55px;">
                            
                            </div> 
                            <div class="col-12">
                                <input type="text" class="form-control border-0" name="number" id="number" placeholder="Your Phone Number" style="height: 55px;">
                              
                            </div>
                          
                         
                            <div class="col-12">
                                <textarea class="form-control border-0" name="message" id="message" placeholder="Message"></textarea>
                               
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" id="button_send">Send</button>
                            </div>
                            <div class="col-12">
                                   
                                        <p style="display: none" id="contactsuccess" class="text-center text-white">Contact Form Submitted Successfully !</p>
                                 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Us End -->

