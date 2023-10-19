@extends('website.layouts.master')

@section('title')
     About - Sonicar Tech
@endsection

@section('meta_description'){{$sharedData['meta_discription']}}@endsection


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
    @if(isset($aboutTitle) && isset($aboutContent) && isset($aboutImg))
    <!-- ++++ about content ++++ -->
    <section class="bg-white o-hidden common-form-section contact-form-wrapper more-about" id="more-about">
        <div class="container">
            <!--section title -->
            <h2 class="b-clor">{{$aboutTitle->value}}</h2>
            <hr class="dark-line" />
            <!--end section title -->
            <div class="row about-content">
                <div class="col-md-5 col-sm-12 pull-right">
                    <div class="about-img"> <img src="{{asset('uploads/about/'.$aboutImg->value)}}" alt="about" class="img-responsive" /> </div>
                </div>
                <div class="col-md-7 col-sm-12 pull-left">
                    <div>
                        <p class="regular-text">{!! $aboutContent->value !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- end contact form design -->


@endsection







@section('js')


@endsection





