@extends('dashboard.layouts.master-auth')

@section('title')

    Login to admin panel
@endsection

@section('css')

@endsection

@section('content')



    <div
        class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
    >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{asset('Dashboard/vendors/images/login-page-img.png')}}" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <img class="mx-auto d-block" style="max-width: 80px;" src="{{asset('website/images/sonicar-logo.png')}}">
                        </div>
                        <form action="{{route('login.post')}}" method="post">
                            @csrf



                            <div class="input-group custom">
                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    placeholder="Email"
                                    name="email"

                                />

                                <div class="input-group-append custom">
										<span class="input-group-text"
                                        ><i class="icon-copy dw dw-email"></i
                                            ></span>
                                </div>



                            </div>


                            <div class="input-group custom">
                                <input
                                    type="password"
                                    class="form-control form-control-lg"
                                    placeholder="**********"
                                    name="password"
                                />
                                <div class="input-group-append custom">
										<span class="input-group-text"
                                        ><i class="dw dw-padlock1"></i
                                            ></span>
                                </div>

                            </div>

                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            name="remember_me"
                                            class="custom-control-input"
                                            id="customCheck1"
                                        />
                                        <label class="custom-control-label text-dark" for="customCheck1"
                                        >Remember</label
                                        >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password">
                                        <a href="forgot-password.html">Forgot Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <!--
                                        use code for form submit
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                    -->
                                        <button
                                            class="btn btn-lg btn-block"style="background-color: #ff8d04;color: #fff"
                                            href="index.html"
                                            type="submit"

                                        >Sign In</button
                                        >
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')

    <script>
        @if($errors->any())
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.info("{{ $errors->first() }}");
        @endif
    </script>

@endsection


