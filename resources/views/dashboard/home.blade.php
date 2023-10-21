@extends('dashboard.layouts.master')

@section('title')

    Admin Panel
@endsection

@section('css') @endsection

@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">Site Overview</h2>
            </div>

            <div class="row pb-10">
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{$visits}}</div>
                                <div class="font-14 text-secondary weight-500">
                                    Visits
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#00eccf">
                                    <i class="icon-copy fa fa-eye-slash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{$blogIsPublish}}</div>
                                <div class="font-14 text-secondary weight-500">
                                    Blog Is Publish
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#ff5b5b">
                                    <i class="icon-copy ion-clipboard"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{$quotes}}</div>
                                <div class="font-14 text-secondary weight-500">
                                    Free Quotes
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon">
                                    <i
                                        class="icon-copy fa fa-tags"
                                        aria-hidden="true"
                                    ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{$subscriptions}}</div>
                                <div class="font-14 text-secondary weight-500">Mail Subscriptions</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#09cc06">
                                    <i class="icon-copy ion-email-unread"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pb-10" >
                <div class="col-md-6 mb-20">
                    <div class="card-box height-100-p pd-20">
                        <div
                            class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3"
                        >
                            <div class="h5 mb-md-0">{{ $chart1->options['chart_title'] }}</div>

                        </div>
                        <div >{!! $chart1->renderHtml() !!}</div>
                    </div>
                </div>

                <div class="col-md-6 mb-20">
                    <div class="card-box height-100-p pd-20">
                        <div
                            class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3"
                        >
                            <div class="h5 mb-md-0">{{ $chart2->options['chart_title'] }}</div>

                        </div>
                        <div >{!! $chart2->renderHtml() !!}</div>
                    </div>
                </div>
            </div>


            <div class="card-box pb-10">
                <div class="h5 pd-20 mb-0">Recent Free Quotes</div>
                <table class="data-table table nowrap">
                    <thead>
                    <tr>
                        <th class="table-plus">Name</th>
                        <th>Email</th>
                        <th>Service</th>
                        <th>Budget</th>
                        <th>Message</th>
                        <th>Created_at</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($latestFreeQuotes as $quote)
                    <tr>

                        <td>{{$quote->name}}</td>
                        <td>{{$quote->email}}</td>
                        <td>
									<span
                                        class="badge badge-pill"
                                        data-bgcolor="#e7ebf5"
                                        data-color="#265ed7"
                                    >{{$quote->service}}</span
                                    >
                        </td>

                        <td>{{$quote->price}}</td>
                        <td>{{$quote->message}}</td>
                        <td>{{date_format($quote->created_at,'d-m-Y')}}</td>
                        <td>
                            <div class="table-actions">

                                <a href="{{route('free.qoute.destroy',$quote->id)}}" data-confirm-delete="true" data-color="#e95959"
                                ><i class="icon-copy dw dw-delete-3"></i
                                    ></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>




        </div>
    </div>
@endsection



@section('js')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}

@endsection
