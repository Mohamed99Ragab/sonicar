<!-- most top information -->
<div class="header-wrapper">
    <header id="top">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12  hidden-xs">
                    <form action="{{route('blog.search')}}" method="post">
                        @csrf
                        <div id="custom-search-input">
                            <div class="input-group"> <span class="input-group-btn">
                                            <button class="btn" type="submit"> <span class="icon-magnifier"></span> </button>
                                    </span>
                                <input type="text" name="search" class="search-query form-control" placeholder="Search" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <ul class="pull-right header-right">
                        @if(isset($sharedData['phone']))
                        <li> <a href="tel:{{$sharedData['phone']}}"><span class="icon-telephone"></span><span>{{$sharedData['phone']}}</span></a></li>
                        @endif
                        <li> <img src="{{asset('website/images/separator.png')}}" alt="separator" class="img-responsive" /> </li>
                        @if(isset($sharedData['email']))

                            <li> <a href="mailto:{{$sharedData['email']}}"><span class="icon-envelope"></span><span>{{$sharedData['email']}}</span></a> </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end most top information -->
    <!--navigation-->
    <nav id="navbar-main" class="navbar main-menu navbar-expand-md">
        <div class="container">
            <!--Brand and toggle get grouped for better mobile display-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggler collapsed" data-bs-toggle="collapse" data-bs-target="#navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('website/images/Sonicar-logo.png')}}" alt="Brand" class="img-responsive" /></a>
            </div>
            <!--Collect the nav links, and other content for toggling-->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"> <a href="#" data-bs-toggle="dropdown" class="dropdown-toggle">Services</a>
                        <ul class="dropdown-menu">
                            <li><a href="logo-and-branding.html"><span class="icon-palette"></span>Logo &amp; Branding</a></li>
                            <li><a href="website-development.html" class="b-clor"><span class="icon-laptop-phone"></span>Website Development</a></li>
                            <li><a href="mobile-app-development.html"><span class="icon-smartphone-embed"></span>Mobile App Development</a></li>
                            <li><a href="seo.html"><span class="icon-magnifier"></span>Search Engine Optimization</a></li>
                            <li><a href="pay-per-click.html"><span class="icon-select2"></span>Pay-Per-Click</a></li>
                            <li><a href="social-media-marketing.html"><span class="icon-share"></span>Social Media Marketing</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('projects')}}">Portfolio</a></li>
                    <li><a href="{{route('about')}}">About</a></li>
                    <li><a href="{{url('blogs')}}">Blog</a></li>

{{--                    <li class="dropdown"> <a href="#" data-bs-toggle="dropdown" class="dropdown-toggle">Blog</a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="blog.html">Blog Version 1</a></li>--}}
{{--                            <li><a href="blog-version-2.html" class="b-clor">Blog Version 2</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li><a href="{{route('contactus')}}">Contact</a></li>
                    <li class="btn btn-fill" data-bs-toggle="modal" data-bs-target="#getAQuoteModal"><a href="#">GET A QUOTE<span class="icon-chevron-right"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!--end navigation-->
