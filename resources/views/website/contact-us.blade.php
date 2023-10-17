
@extends('website.layouts.master')

@section('title')
   Contact Us | Sonicar Tech
@endsection

@section('css')

@endsection

@section('content')

    <!-- ++++ banner ++++ -->
    <section class="banner  o-hidden banner-inner contact-banner">
        <div class="container">
            <!--banner text-->
            <div class="banner-txt">
                <h1>Contact</h1>
                <p class="semi-bold">Get in touch with us to see how our company can help you grow
                    <br /> your business online.</p>
            </div>
            <!--end banner text-->
        </div>
    </section>
    <!-- ++++ end banner ++++ -->
    <!-- ++++ contact form design ++++ -->
    <section class="bg-white o-hidden common-form-section contact-form-wrapper">
        <div class="container">
            <!--section title -->
            <h2 class="b-clor">Send Us a Message</h2>
            <hr class="dark-line" />
            <!--end section title -->
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12">
                    <div class="customise-form contact-form">
                        <form  action="{{route('contactus.send')}}" method="post">
                           @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group customised-formgroup"> <span class="icon-user"></span>
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group customised-formgroup"> <span class="icon-envelope"></span>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group customised-formgroup"> <span class="icon-telephone"></span>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group customised-formgroup"> <span class="icon-laptop"></span>
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group customised-formgroup"> <span class="icon-bubble"></span>
                                        <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-wrapper">
                                <button type="submit" class="btn btn-fill">Contact us now!</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="contact-info-box-wrapper">
                        <div class="contact-info-box"> <span class="icon-telephone"></span>
                            <div>
                                <h6>Give us a call</h6>
                                <a href="tel:012.345.1234"><p>0123451234</p></a>
                            </div>
                        </div>
                        <div class="contact-info-box"> <span class="icon-envelope"></span>
                            <div>
                                <h6>Send an email</h6>
                                <a href="mailto:info@company.com">
                                <p>info@sonicar.tech</p>
                                </a>
                            </div>
                        </div>
                        <div class="contact-info-box">
                            <ul class="social-links">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-google-plus"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                                <li><a href="#"><span class="icon-pinterest"></span></a></li>
                                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact form design -->
    <!-- google map location section start-->
    <section class="bg-white google-map-location">
        <div class="container">
            <!--section title -->
            <h2 class="b-clor text-align-center">Visit Our Work Places</h2>
            <!--end section title -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- design process steps-->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs process-model contact-us-tab" role="tablist">
                        <li role="presentation" class="active"><a href="#egypt" aria-controls="egypt" role="tab" data-bs-toggle="tab"><span class="icon-Asset-1"></span>
                                <p>Egypt</p>
                            </a></li>

                    </ul>
                    <!-- end design process steps-->
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="egypt">
                            <p class="regular-text">Beni Suef - Alfashin - Alkodaby</p>
{{--                            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=الفشن - القضابي&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" height="500" style="border:0; width:100%" allowfullscreen></iframe>--}}
{{--                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3496.7051889227405!2d30.89912622496065!3d28.788052077002195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145a4bdb06c979a9%3A0x1b5631542405c66e!2z2KfYqNmIINix2KzYqCDZhNiq2LXZhdmK2YUg2KfZhNmF2YjYp9mC2Lk!5e0!3m2!1sar!2seg!4v1697395486366!5m2!1sar!2seg"  height="500" style="border:0;width:100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end google map location section-->

@endsection







@section('js')


@endsection





