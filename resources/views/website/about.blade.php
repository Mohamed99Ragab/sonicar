@extends('website.layouts.master')

@section('title')
    Sonicar Tech - About
@endsection

@section('css')

@endsection

@section('content')

    <!-- ++++ banner ++++ -->
    <section class="banner  o-hidden banner-inner about-banner" style="margin-top: 5rem !important;">
        <div class="container">
            <!--banner text-->
            <div class="banner-txt">
                <h1>About</h1>
                <p class="semi-bold">What makes a company great? That’s simple.
                    <br /> It’s the people who work here.</p>
                <a href="#more-about" class="medium-btn2 btn btn-nofill page-scroll">EXPERIENCE US</a> </div>
            <!--end banner text-->
        </div>
    </section>
    <!-- ++++ end banner ++++ -->
    <!-- ++++ about content ++++ -->
    <section class="bg-white o-hidden common-form-section contact-form-wrapper more-about" id="more-about">
        <div class="container">
            <!--section title -->
            <h2 class="b-clor">We’re Your Partner in Your Success</h2>
            <hr class="dark-line" />
            <!--end section title -->
            <div class="row about-content">
                <div class="col-md-5 col-sm-12 pull-right">
                    <div class="about-img"> <img src="{{asset('website/images/about/about-right-img.jpg')}}" alt="about" class="img-responsive" /> </div>
                </div>
                <div class="col-md-7 col-sm-12 pull-left">
                    <div>
                        <p class="regular-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum.</p>
                        <p class="regular-text">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                        <p class="regular-text">Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact form design -->


@endsection







@section('js')


@endsection





