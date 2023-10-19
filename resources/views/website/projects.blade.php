@extends('website.layouts.master')


@section('title')
    Portfolio - Sonicar Tech
@endsection
@section('meta_description') @endsection

@section('css')

@endsection

@section('content')


        <!-- ++++ banner ++++ -->
        <section class="banner o-hidden banner-inner portfolio-banner" style="margin-top: 5rem !important;">
            <div class="container">
                <!--banner text-->
                <div class="banner-txt">
                    <h1>Portfolio</h1>
                    <p class="semi-bold">We use strategic approaches to provide our clients with high-end.
                        <br /> services that ensure superior customer satisfaction.</p>
                    <a href="#more-portfolio" class="medium-btn2 btn btn-nofill page-scroll">DISCOVER MORE</a> </div>
                <!--end banner text-->
            </div>
        </section>
        <!-- ++++ end banner ++++ -->
        <!-- ++++ Featured Project content ++++ -->
        <section class="o-hidden bg-white featured-design-section mobile-app-featured">
            <div class="container">
                <!--section title -->
                <h2 class="b-clor">Featured Projects</h2>
                <hr class="dark-line" />
                <!--end section title -->
                <div class="row margin-top-40 portfolio-p l-margin portfolio">
                    @foreach($featureProjects as $project)
                    <div class="col-sm-6 col-md-4">
                        <div class="grid-item">

                            <div class="img_container is-featured">
                                <img src="{{asset("uploads/projects/$project->home_img")}}" alt="port_img" class="img-responsive">
                                <div class="overlay">
                                    <a onclick="showModal(event)" data-id="{{$project->id}}" class="btn btn-nofill proDetModal{{$project->id}}" >Discover</a>
                                </div>
                                <!-- End of .overlay -->
                            </div>
                            <!-- End of .img_container -->
                            <div class="text-content">
                                <h3><a onclick="showModal(event)" data-id="{{$project->id}}" class="proDetModal proDetModal{{$project->id}}">{{$project->title}}<span>{{$project->category}}</span></a></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- ++++ end Featured Project content ++++ -->
        <!-- ++++ full portfolio section ++++ -->
        <!--portfolio section-->
        <section class="portfolio clearfix" id="more-portfolio">
            <div class="container">
                <!--section title -->
                <h2 class="b-clor">Our Impressive Portfolio</h2>
                <hr class="dark-line"/>
                <!--end section title -->
                <div class="button-group filter-button-group clearfix">
                    <button class="button is-checked" data-filter="*">All Work</button>
                    <button class="button" data-filter=".a1">Web Apps</button>
                    <button class="button" data-filter=".a2">Mobile App</button>
                    <button class="button" data-filter=".a3">UI/UX</button>
                    <button class="button" data-filter=".a4">Technical Writing</button>
                </div>
                <!-- button-group ends -->
                <div class="grid clearfix row">
                    <!-- Items for portfolio
                    currently using 12 items. More Items can be added. -->
                    @foreach($projects as $project)
                        @if($project->category == 'Web Apps')
                            <div class="a1 grid-item">
                                <div class="img_container">
                                    <img src="{{asset("uploads/projects/$project->home_img")}}" alt="port_img" class="img-responsive">
                                    <div class="overlay">
                                        <a onclick="showModal(event)" data-id="{{$project->id}}" class="btn btn-nofill proDetModal{{$project->id}}" >Discover</a>
                                    </div>
                                    <!-- End of .overlay -->
                                </div>
                                <!-- End of .img_container -->
                                <div class="text-content">
                                    <h3><a onclick="showModal(event)" data-id="{{$project->id}}" class="proDetModal proDetModal{{$project->id}}">{{$project->title}}<span>{{$project->category}}</span></a></h3>
                                </div>
                            </div>

                        @elseif($project->category == 'Technical Writing')
                            <div class="a4 grid-item">
                                <div class="img_container">
                                    <img src="{{asset("uploads/projects/$project->home_img")}}" alt="port_img" class="img-responsive">
                                    <div class="overlay">
                                        <a onclick="showModal(event)" data-id="{{$project->id}}" class="btn btn-nofill proDetModal{{$project->id}}">Discover</a>
                                    </div>
                                    <!-- End of .overlay -->
                                </div>
                                <!-- End of .img_container -->
                                <div class="text-content">
                                    <h3><a onclick="showModal(event)" data-id="{{$project->id}}" class="proDetModal proDetModal{{$project->id}}">{{$project->title}}<span>{{$project->category}}</span></a></h3>
                                </div>
                            </div>

                        @elseif($project->category == 'Mobile App')
                            <div class="a2 grid-item">
                                <div class="img_container">
                                    <img src="{{asset("uploads/projects/$project->home_img")}}" alt="port_img" class="img-responsive">
                                    <div class="overlay">
                                        <a  onclick="showModal(event)" data-id="{{$project->id}}" class="btn btn-nofill proDetModal9 discoverBtn" >Discover</a>
                                    </div>
                                    <!-- End of .overlay -->
                                </div>
                                <!-- End of .img_container -->
                                <div class="text-content">
                                    <h3><a onclick="showModal(event)" data-id="{{$project->id}}" class="proDetModal proDetModal1">{{$project->title}}<span>{{$project->category}}</span></a></h3>
                                </div>
                            </div>

                        @elseif($project->category == 'UI/UX')
                            <div class="a3 grid-item">
                                <div class="img_container">
                                    <img src="{{asset("uploads/projects/$project->home_img")}}" alt="port_img" class="img-responsive">
                                    <div class="overlay">
                                        <a onclick="showModal(event)" data-id="{{$project->id}}" class="btn btn-nofill proDetModal{{$project->id}}">Discover</a>
                                    </div>
                                    <!-- End of .overlay -->
                                </div>
                                <!-- End of .img_container -->
                                <div class="text-content">
                                    <h3><a onclick="showModal(event)" data-id="{{$project->id}}" class="proDetModal proDetModal{{$project->id}}">{{$project->title}}<span>{{$project->category}}</span></a></h3>
                                </div>
                            </div>

                        @endif


                    @endforeach
                    <!-- End of .grid-item -->

                    <!-- to add more items to the portfolio section copy and paste any
                    of the items underneath the last item -->
                </div>
                <!-- End of .grid -->

            </div>
        </section>

        <!--  ++++ end full portfolio section ++++ -->




        <!--portfolio details  modal-->
        <div class="modal fade verticl-center-modal" id="portfolioDetModal" tabindex="-1" role="dialog"
             aria-labelledby="portfolioDetModal{{$project->id}}">
            <div class="modal-dialog getguoteModal-dialog potfolio-modal" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            class="icon-cross-circle"></span></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <!-- main slider carousel -->
                                <div id="slider0">
                                    <div id="carousel-bounding-box">
                                        <div id="myCarousel1" class="carousel slide myCarousel">
                                            <!-- main slider carousel items -->
                                            <div class="carousel-inner">


                                            </div>
                                            <div id="slider-thumbs">
                                                <!-- thumb navigation carousel items -->
                                                <ul class="list-inline  thumb-list">




                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="port-modal-content">
                                    <p class="gray-text" id="modalCategory">Featured - Design</p>
                                    <h2 class="b-clor" id="modalPortoTitle"></h2>
                                    <p class="regular-text" id="modalDesc"></p>

                                </div>
                                @if($project->projectDetails)
                                    <h3>We delivered:</h3>
                                    <ul class="list-with-arrow">


                                    </ul>
                                @endif
                                <a href="" id="projectLaunchBtn" target="_blank" class="medium-btn2  btn btn-fill">Launch website</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection







@section('js')

    <script>

        function showModal(event){

            let project_id = event.target.getAttribute('data-id')

            $.ajax({
                url: "{{url('api/projects/get-project')}}"+"/"+project_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);

                    $('#modalPortoTitle').html(data.title);
                    $('#modalCategory').html(data.category);
                    $('#modalDesc').html(data.description);
                    $('#projectLaunchBtn').attr('href',data.url);
                    let slides = document.querySelectorAll(".carousel-inner carousel-item.item img");

                    let container = ``;
                    let listOfThumb = ``;

                    for (const object of data.attachments) {
                       container +=  `
                        <div class="carousel-item item" data-slide-number="${object.id}">
                                <img src="{{asset('uploads/projects')}}/${object.file}" alt="images"
                                     class="img-responsive">
                        </div>
                        `;

                        listOfThumb += `  <li>
                                            <a onclick=(toggleSlide(event)); id="carousel-selector-${object.id}" class="carousel-selector"> <img
                                                    src="{{asset('uploads/projects')}}/${object.file}"
                                                    class="img-responsive " alt=""> </a>
                                        </li>`;



                    }

                    let listOfDelevired = ``;
                    for (const item of data.project_details) {
                        listOfDelevired += ` <li><i class="icon-chevron-right"></i> ${item.item_delivered}</li>`;

                    }



                    document.querySelector('.carousel-inner').innerHTML = container;


                    document.querySelector('ul.list-inline.thumb-list').innerHTML = listOfThumb;

                    document.querySelector('.list-with-arrow').innerHTML = listOfDelevired;

                    document.querySelector('.carousel-item.item').classList.add('active');

                    document.querySelector('.carousel-selector').classList.add('selected');



                    $('#portfolioDetModal').modal('show');




                },
                error: function (xhr, status, error) {

                    console.error("Error: " + error);
                }
            });
        }



        function toggleSlide(event){

            // console.log(event.target);
            let imgSrc = event.target.getAttribute('src');

            var link = event.target.parentNode;

            var siblings =  link.children;




          let links =  document.querySelectorAll('.carousel-selector');
            for (const link of links) {
                link.classList.remove('selected')
            }
            link.classList.add("selected");



            document.querySelector('.carousel-item.item img').setAttribute('src',imgSrc);
            document.querySelector('.carousel-item.item').classList.add('active');

        }

    </script>
@endsection





