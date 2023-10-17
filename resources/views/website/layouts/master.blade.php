<!DOCTYPE html>
<html lang="zxx">

@include('website.layouts.head')
<body>

@include('website.layouts.header')

<div class="whatsapp-chat">
    <a  href="https://wa.link/nnle7w" target="_blank"  data-toggle="tooltip" data-placement="left" title="Chat on WhatsApp" >
        <i class="fab fa-whatsapp"></i>
    </a>
</div>



@yield('content')

@include('sweetalert::alert')

<!-- ++++ footer ++++ -->
@include('website.layouts.footer')
<!--end footer-->

<!--get a quote modal-->
<div class="modal fade verticl-center-modal" id="getAQuoteModal" tabindex="-1" role="dialog"
     aria-labelledby="getAQuoteModal">
    <div class="modal-dialog getguoteModal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        class="icon-cross-circle"></span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="customise-form">
                            <form action="{{route('free.quote.send')}}"  method="post">
                                @csrf
                                <h3>Get a Free Quote</h3>
                                <div class="form-group customised-formgroup"><span class="icon-user"></span>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group customised-formgroup"><span class="icon-envelope"></span>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group customised-formgroup"><span class="icon-cash-dollar"></span>
                                    <input type="text" name="price" class="form-control" placeholder="Price">
                                </div>
                                <div class="form-group customised-formgroup">
                                    <select name="service" class="form-select">
                                       <option readonly="" disabled selected>Select Service..</option>
                                        <option value="Web Apps">Web Apps</option>
                                        <option value="Mobile App">Mobile App</option>
                                        <option value="UI/UX">UI/UX</option>
                                        <option value="Technical Writing">Technical Writing</option>
                                        <option value="Planing">Planing</option>
                                    </select>
                                </div>
                                <div class="form-group customised-formgroup"><span class="icon-bubble"></span>
                                    <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-fill full-width">GET A QUOTE<span
                                            class="icon-chevron-right"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3>What’s Next?</h3>
                        <ul class="list-with-arrow">
                            <li>An email and phone call from one of our representatives.</li>
                            <li>A time &amp; cost estimation.</li>
                            <li>An in-person meeting.</li>
                        </ul>
                        <div class="contact-info-box-wrapper">
                            <div class="contact-info-box"><span class="icon-telephone"></span>
                                <div>
                                    <h6>Give us a call</h6>
                                    <p>(123) 456 7890</p>
                                </div>
                            </div>
                            <div class="contact-info-box"><span class="icon-envelope"></span>
                                <div>
                                    <h6>Send an email</h6>
                                    <p>yourcompany@sample.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end get a quote modal-->



<!-- ++++ Javascript libraries ++++ -->
<!--js library of jQuery-->
@include('website.layouts.scripts')


</body>

</html>
