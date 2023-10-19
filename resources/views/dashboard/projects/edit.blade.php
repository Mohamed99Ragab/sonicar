@extends('dashboard.layouts.master')

@section('title')

    Edit {{$project->title}} Project
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
                                <h4>Our Projects</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('projects.index')}}">projects</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Edit {{$project->title}}
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


                    <div class="pd-20">
                        <a href="{{ route('projects.index') }}"  class="btn btn-dark text-white">Back</a>
                    </div>

                    <div class="pb-20 container">

                        <form id="deleteCheckInputForm" action="{{route('projects.update',$project->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" value="{{$project->title}}" id="title" name="title" class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror"  required>
                                    <option readonly selected> Please select project category</option>
                                    <option {{$project->category == 'Web Apps' ? 'selected':''}} value="Web Apps">Web Apps</option>
                                    <option {{$project->category == 'Mobile App' ? 'selected':''}} value="Mobile App">Mobile App</option>
                                    <option {{$project->category == 'UI/UX' ? 'selected':''}} value="UI/UX">UI/UX</option>
                                    <option {{$project->category == 'Planing' ? 'selected':''}} value="Planing">Planing</option>
                                    <option {{$project->category == 'Technical Writing' ? 'selected':''}} value="Technical Writing">Technical Writing</option>
                                </select>
                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea cols="3" id="description" name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="write desc about project...">{{$project->description}}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="url">URL:</label>
                                        <input value="{{$project->url}}" type="text" id="url" name="url" class="form-control @error('url') is-invalid @enderror">
                                        @error('url')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="url" for="is_featured">Is Feature:</label>
                                        <br>
                                        <input type="checkbox" {{$project->is_featured == 1 ? 'checked':''}}  name="is_featured">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="home_img">Project Image:</label>
                                <input type="file" id="home_img" name="home_img" class="form-control @error('home_img') is-invalid @enderror">
                                <small class="text-danger">dimentions: 360 x 280</small>
                                @error('home_img')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>







@endsection



@section('js')


    <!-- Datatable Setting js -->
    <script src="{{asset('dashboard/vendors/scripts/datatable-setting.js')}}"></script>



    <script src="{{asset('dashboard/src/scripts/repeater.js')}}"></script>
    <script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>
@endsection
