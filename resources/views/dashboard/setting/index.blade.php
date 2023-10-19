@extends('dashboard.layouts.master')

@section('title')

     Settings - Sonicar tech
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
                                <h4>Settings</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Home</a>
                                    </li>

                                    <li class="breadcrumb-item active" aria-current="page">
                                         Settings
                                    </li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="card-box mb-30">



                    <div class="pd-20">
                        <h5 class="my-3">About Page</h5>

                    </div>

                    <div class="pb-20 container">

                        <form action="{{route('setting.about')}}"method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="">about title:</label>
                                <input value="{{isset($settings['about_title'])?$settings['about_title']->value : '' }}" type="text"name="about_title" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="">about Img:</label>
                                @if(isset($settings['about_img']))
                                <br>
                                <img src="{{asset('uploads/about/'.$settings['about_img']->value)}}" class="mb-2" style="max-width: 80px;" alt="" srcset="">
                                @endif
                                <input type="file"name="about_img" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="">about description:</label>
                                <textarea
                                    class="textarea_editor form-control border-radius-0" name="about_content"
                                    placeholder="write about content.."
                                >{!! isset($settings['about_content']) ? $settings['about_content']->value :'' !!}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary my-2">Save</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="main-container" style="padding-top:20px !important; ">




        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="card-box mb-30">

                    <div class="pd-20">
                        <h5> Site Meta </h5>
                    </div>

                    <div class="pb-20 container">


                        <form action="{{route('setting.meta')}}"method="post">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="">meta title</label>
                                <input value="{{isset($settings['meta_title']) ? $settings['meta_title']->value : ''}}" type="text"name="meta_title" class="form-control">
                            </div>



                            <div class="form-group mb-2">
                                <label for="">meta description</label>
                                <textarea
                                    class="form-control" name="meta_discription"
                                    placeholder="Enter your text.."
                                >{{isset($settings['meta_discription']) ? $settings['meta_discription']->value : ''}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary my-2">Save</button>
                        </form>



                    </div>
                </div>


            </div>
        </div>
    </div>



    <div class="main-container" style="padding-top:20px !important; ">




        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="card-box mb-30">

                    <div class="pd-20">
                        <h5> Contact Info </h5>
                    </div>

                    <div class="pb-20 container">


                        <form action="{{route('setting.contact')}}"method="post">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="">Phone number</label>
                                <input value="{{isset($settings['phone_number'])? $settings['phone_number']->value : ''}}" type="text"name="phone_number" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="">Email</label>
                                <input value="{{isset($settings['email'])? $settings['email']->value : ''}}" type="email"name="email" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="">Facebook</label>
                                <input value="{{isset($settings['facebook'])? $settings['facebook']->value : ''}}" type="text"name="facebook" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="">Linkedin</label>
                                <input value="{{isset($settings['linkedin'])? $settings['linkedin']->value : ''}}" type="text"name="linkedin" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="">Twitter</label>
                                <input value="{{isset($settings['twitter'])? $settings['twitter']->value : ''}}" type="text"name="twitter" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="">Instagram</label>
                                <input value="{{isset($settings['instagram'])? $settings['instagram']->value : ''}}" type="text"name="instagram" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="">Youtube</label>
                                <input value="{{isset($settings['youtube'])? $settings['youtube']->value : ''}}" type="text"name="youtube" class="form-control">
                            </div>





                            <button type="submit" class="btn btn-primary my-2">Save</button>
                        </form>



                    </div>
                </div>


            </div>
        </div>
    </div>







@endsection



@section('js')


@endsection
