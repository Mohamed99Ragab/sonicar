@extends('dashboard.layouts.master')

@section('title')

    FreeQuote Report | Sonicar Tech
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
                                <h4>FreeQuotes Send Report</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Send Report
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



                    <div class="pb-20 container">

                        <div class="w-75  pt-4">
                            <form action="{{route('free.quote.report.send')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <textarea class="form-control" name="message" cols="4" placeholder="write message that you notify users by it"></textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Notify</button>
                            </form>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>







@endsection



@section('js')





@endsection
