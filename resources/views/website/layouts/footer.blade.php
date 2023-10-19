<footer id="footer">
    <!--scroll to top-->
    <a class="top-btn page-scroll" href="#top"><span class="icon-chevron-up b-clor regular-text text-center"></span></a>
    <!--end scroll to top-->
    <!--newsletter section-->
    <div class="grey-dark-bg text-center">
        <div class="container">
            <h2>Sign up for our newsletter to stay up to date with tech news!</h2>
            <div class="customise-form">
                <form action="{{route('subscripe.store')}}" method="post">
                @csrf
                <div class="row">
                    <!--box one-->
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group customised-formgroup"> <span class="icon-user"></span>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <!--end box one-->
                    <!--box two-->
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group customised-formgroup"> <span class="icon-envelope"></span>
                            <input type="email"  name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <!--end box two-->
                    <!--box three-->
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div>
                            <input class="btn btn-fill full-width" type="submit" value="SIGN UP FOR FREE!" />
                        </div>
                    </div>
                    <!--end box three-->
                </div>
                </form>
                <p class="light-gray-font-color">Lorem ipsum dolor sit amet, consectetuer adipi scing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
            </div>
        </div>
    </div>
    <!--end newsletter section-->
    <!--footer content-->
    <div class="light-ash-bg">
        <div class="container">
            <ul>
                <li>
                    <!-- footer left content-->
                    <ul>
                        <li>
                            <a style="max-width: 30px" href="{{url('/')}}"><img src="{{asset('website/images/icon.png')}}" alt="logo" class="img-responsive logo"></a>
                        </li>
                        <li>
                            <p class="extra-small-text">&copy; 2023</p>
                        </li>
                        <li>
                            <p class="extra-small-text">Sonicar Tech</p>
                        </li>
                    </ul>
                    <!--end footer left content-->
                </li>
                <li>
                    <!--footer service list-->
                    <ul>
                        <li><a class="regular-text text-color-light">Services</a></li>
                        <li><a href="#" class="extra-small-text">Analysis & Planing</a></li>
                        <li><a href="#" class="extra-small-text">Website Development</a></li>
                        <li><a href="#" class="extra-small-text">Mobile App Development</a></li>
                        <li><a href="#" class="extra-small-text">Technical Writing Services</a></li>
                        <li><a href="#" class="extra-small-text">UI/UX</a></li>
                        <li><a href="#" class="extra-small-text">Social Media Marketing</a></li>
                    </ul>
                    <!--end footer service list-->
                </li>
                <li>
                    <!--footer Resources list-->
                    <ul>
                        <li><a class="regular-text text-color-light">Resources</a></li>
                        <li><a href="{{url('projects')}}" class="extra-small-text">Portfolio</a></li>
                        <li><a href="{{url('blogs')}}" class="extra-small-text">Blog</a></li>
                    </ul>
                    <!--end footer Resources list-->
                </li>
                <li>
                    <!--footer Support list-->
                    <ul>
                        <li><a class="regular-text text-color-light">Support</a></li>
                        <li><a href="{{url('contact-us')}}" class="extra-small-text">Contact</a></li>
                        <li><a href="#" class="extra-small-text">Privacy Policy</a></li>
                        <li><a href="#" class="extra-small-text">Terms & Conditions</a></li>
                    </ul>
                    <!--end footer Support list-->
                </li>
                <li class="big-width">
                    <!--footer social media list-->
                    <ul class="list-inline">
                        <li>
                            <p class="regular-text text-color-light">Get in Touch</p>
                            <ul class="social-links">
                                @if(isset($socialLinks['facebook']))
                                    <li><a href="{{$socialLinks['facebook']}}" target="_blank"><span class="icon-facebook"></span></a></li>
                                @endif

                                @if(isset($socialLinks['twitter']))
                                    <li><a href="{{$socialLinks['twitter']}}" target="_blank"><span class="icon-twitter"></span></a></li>
                                @endif

                                @if(isset($socialLinks['gmail']))
                                    <li><a href="mailto:{{$socialLinks['gmail']}}" target="_blank"><span class="icon-google-plus"></span></a></li>
                                @endif

                                @if(isset($socialLinks['instagram']))
                                    <li><a href="{{$socialLinks['instagram']}}" target="_blank"><span class="icon-instagram"></span></a></li>
                                @endif

                                @if(isset($socialLinks['linkedin']))
                                    <li><a href="{{$socialLinks['linkedin']}}" target="_blank"><span class="icon-linkedin"></span></a></li>
                                @endif

                                @if(isset($socialLinks['youtube']))
                                    <li><a href="{{$socialLinks['youtube']}}" target="_blank"><span class="icon-youtube"></span></a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <!--end footer social media list-->
                </li>
            </ul>
        </div>
    </div>
    <!--end footer content-->
</footer>
