@extends('website.layouts.master')

@section('title')
    {{$blog->title}} - Sonicar-Tech
@endsection
@section('meta_description') {{ strip_tags(html_entity_decode(substr($blog->content,0,100))) }} @endsection

@section('css')

@endsection

@section('content')

    <!-- ++++ Most Bold Title ++++ -->
    <section class="blog-title" style="margin-top: 90px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Blog</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- ++++ Most Bold Title ++++ -->
    <!-- ++++ blog standard content ++++ -->
    <section class="page-section bg-white o-hidden blog-content">
        <div class="container relative">
            <div class="row">
                <!-- Content -->
                <div class="col-md-8">
                    <!-- Post -->
                    <!-- Post Title -->
                    <h2 class="blog-item-title font-alt"><a href="#">{{$blog->title}}</a></h2>
                    <!-- Date, Categories, Author, Comments -->
                    <div class="blog-item-data"> <a href="#"><i class="icon-calendar-full"></i> {{date_format($blog->created_at,'d M, Y')}}</a> <span class="separator">&nbsp;</span> <a href="#"><i class="icon-list4"></i> {{$blog->category->name}} Category</a> <span class="separator">&nbsp;</span>
                        <br class="visible-xs">
                        <a href=""><i class="icon-user"></i> {{$blog->user->name}}</a>  </div>
                    <!-- Image -->
                    <div class="blog-media">
                        <a href="{{route('blog.details',$blog->slug)}}"><img src="{{asset('uploads/blogs/'.$blog->file)}}" alt="" /></a>
                    </div>
                    <div class="blog-item-body">
                        <p> {!! $blog->content !!} </p>
                    </div>
                    <!--blog share-->
                    <div class="blog-post-share">
                        <ul class="social-links">
                            <li>Share this post:</li>
                            {!! $shareComponent !!}
{{--                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>--}}
{{--                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>--}}
{{--                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>--}}
{{--                            <li><a href="#"><span class="fa fa-instagram"></span></a></li>--}}
{{--                            <li><a href="#"><span class="fa fa-pinterest"></span></a></li>--}}
{{--                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>--}}
                        </ul>
                    </div>
                    <!--blog share end-->
                    @if($relatedBlogs->count() > 0)
                    <section class="bg-white o-hidden blog-design-category blog-rel-post">
                        <!--blog content row one-->
                        <!--section title -->
                        <h2 class="b-clor">Related Posts</h2>
                        <hr class="dark-line">
                        <!--end section title -->
                        <div class="row">
                            @foreach($relatedBlogs as $blog)
                            <!--blog content box-->
                            <div class="col-sm-12 col-md-6">
                                <div class="box-content-with-img ">
                                    <a href="{{route('blog.details',$blog->slug)}}">
                                    <img src="{{asset('uploads/blogs/'.$blog->file)}}" class="img-responsive" alt="blog image">
                                    </a>
                                    <div class="box-content-text equalheight" style="height: 293px;">
                                        <p class="gray-text"><span class="icon-calendar-full"></span>{{date_format($blog->created_at,'d M, Y')}}</p>
                                        <h3 class="semi-bold"><a href="{{route('blog.details',$blog->slug)}}">{{$blog->title}}</a></h3>
                                        <p class="regular-text">{!! substr($blog->content,0,100) !!}..</p>
                                    </div>
                                </div>
                            </div>
                            <!--end blog content box-->
                            @endforeach

                        </div>
                        <!--end blog content row one-->
                    </section>
                    @endif
                        <!-- End Post -->
                </div>
                <!-- End Content -->
                <!-- Sidebar -->
                <div class="col-md-4 col-lg-3 col-lg-offset-1 sidebar">
                    <!-- Search Widget -->
                    <div class="widget">
                        <form class="form-inline form" action="{{route('blog.search')}}" method="post">
                            @csrf
                            <div class="search-wrap">
                                <button class="search-button animate" type="submit" title="Start Search"> <i class="icon-magnifier"></i> </button>
                                <input type="text" name="search" class="form-control search-field" placeholder="Search...">
                            </div>
                        </form>
                    </div>
                    <!-- End Search Widget -->
                    <!-- Widget -->
                    <!-- Widget -->
                    <div class="widget">
                        <h5 class="widget-title font-alt">Recent Posts</h5>
                        <div class="widget-body">
                            <ul class="clearlist widget-posts">
                                @foreach($recentBlogs as $blog)
                                    <li class="clearfix">
                                        <div class="widget-posts-descr"> <a href="{{route('blog.details',$blog->slug)}}" title="">{{$blog->title}}</a> {{date_format($blog->created_at,'d M, Y')}} </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- End Widget -->

                    <!-- Widget -->
                    <div class="widget">
                        <h5 class="widget-title font-alt">Categories</h5>
                        <div class="widget-body">
                            <ul class="clearlist widget-menu">
                                @foreach($categories as $category)
                                    @if($category->blogs->count() > 0)
                                        <li> <a href="#" title="">{{$category->name}} ({{$category->blogs->count()}})</a> </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- End Widget -->
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
    </section>
    <!-- ++++ end blog Standard content ++++ -->


@endsection







@section('js')

    <script>
        sharedButtons = document.querySelectorAll('.social-button');

        for (const element of sharedButtons) {

            element.setAttribute('target','_blank');
        }
    </script>

@endsection





