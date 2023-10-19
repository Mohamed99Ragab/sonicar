@extends('website.layouts.master')

@section('title')
    Blogs - Sonicar-Tech
@endsection

@section('meta_description') @endsection
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
                    @foreach($blogs as $blog)
                    <div class="blog-item">
                        <!-- Post Title -->
                        <h2 class="blog-item-title font-alt"><a href="{{route('blog.details',\Illuminate\Support\Str::slug($blog->title))}}">{{$blog->title}}</a></h2>
                        <!-- Date, Categories, Author, Comments -->
                        <div class="blog-item-data"> <a href="#"><i class="icon-calendar-full"></i>{{date_format($blog->created_at,'d M, Y')}}</a> <span class="separator">&nbsp;</span> <a href="#"><i class="icon-list4"></i> {{$blog->category->name}} Category</a> <span class="separator">&nbsp;</span>
                            <br class="visible-xs">
                            <a href=""><i class="icon-user"></i> {{$blog->user->name}}</a>  </div>
                        <!-- Image -->
                        <div class="blog-media">
                            <a href="{{route('blog.details',\Illuminate\Support\Str::slug($blog->title))}}"><img src="{{asset('uploads/blogs/'.$blog->file)}}" alt="" /></a>
                        </div>
                        <div class="blog-item-body">
                            <p> {!! substr($blog->content,0,150) !!}..</p>
                        </div>
                        <!-- Read More Link -->
                        <div class="blog-item-foot"> <a href="{{route('blog.details',\Illuminate\Support\Str::slug($blog->title))}}" class="medium-btn3 btn btn-nofill green-text">Read More</a> </div>
                    </div>
                    @endforeach
                    <!-- End Post -->



                    <!-- Pagination -->

                    <ul class="pagination top-margin0">
                        {!! $blogs->links() !!}
{{--                        <li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1"><span class="icon-chevron-left"></span></a> </li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item"> <a class="page-link" href="#"><span class="icon-chevron-right"></span></a> </li>--}}
                    </ul>
                    <!-- End Pagination -->
                </div>
                <!-- End Content -->
                <!-- Sidebar -->
                <div class="col-md-4 col-lg-3 col-lg-offset-1 sidebar">
                    <!-- Search Widget -->
                    <div class="widget">
                        <form  action="{{url('blogs/search')}}" method="post">
                            @csrf
                            <div class="search-wrap">
                                <button class="search-button animate" type="submit" title="Start Search"> <i class="icon-magnifier"></i> </button>
                                <input type="text" name="search" class="form-control search-field" placeholder="Search...">
                            </div>
                        </form>
                    </div>
                    <!-- End Search Widget -->
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


@endsection





