@extends('dashboard.layouts.master')

@section('title')

    Profile | Sonicar Tech
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
                                <h4> Profile</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        profile
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

                        <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" value="{{auth()->user()->name}}" name="name" id="name">
                            </div>
                            <div class="form-group mb-2">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" value="{{auth()->user()->email}}" name="email" id="email">
                            </div>

                            <div class="form-group mb-2">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>

                            <div class="form-group mb-2">
                                <label for="confirm-password">Confirm Password:</label>
                                <input type="password" class="form-control" name="password confirmation" id="confirm-password">
                            </div>

                            <div class="form-group mb-2">
                                <label for="photo">Photo:</label>
                                <input type="file" class="form-control" name="photo" id="photo">
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
