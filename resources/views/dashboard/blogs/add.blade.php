@extends('dashboard.layouts.master')

@section('title')

    Add new blog | Sonicar Tech
@endsection

@section('css') @endsection

@section('content')

    <div class="main-container">




        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4> Add new blog</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a href="{{route('blog.index')}}">Blogs</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Add blog
                                    </li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="card-box mb-30">
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger text-center w-50 mx-auto">--}}
{{--                            {{$errors->first()}}--}}
{{--                        </div>--}}
{{--                    @endif--}}



                    <div class="py-4 container">

                        <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="form-group mb-2">
                                <label >Category:</label>
                                <select name="category_id" class="form-control">
                                    <option value="" selected readonly="" disabled>Select category...</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group my-3">
                                <label>Publish:</label>
                                <br>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" checked="" name="status" class="custom-control-input" id="customCheck1"/>
                                    <label class="custom-control-label" for="customCheck1">Status</label>

                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="file">File:</label>
                                <input type="file" class="form-control" name="file" id="file">
                                <small class="text-danger"> dimentions: 360 x 220</small>
                            </div>

                            <div class="form-group mb-2">
                                <label for="file">Content:</label>
                                <textarea
                                    class="textarea_editor form-control border-radius-0" name="content"
                                    placeholder="Enter text ..."
                                ></textarea>
                            </div>

                            <div class="form-group mb-2">
                                <label for="">meta title</label>
                                <input type="text"name="meta_title" class="form-control">
                            </div>



                            <div class="form-group mb-2">
                                <label for="">meta description</label>
                                <textarea
                                    class="form-control" name="meta_description"
                                    placeholder="Enter your text.."
                                ></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>


                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>








@endsection



@section('js')


@endsection
