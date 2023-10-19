@extends('dashboard.layouts.master')

@section('title')

    Subscriptions | Sonicar Tech
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
                                <h4>Subscriptions</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Subscriptions
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

                        <button  data-url="{{ route('subscripe.delete.all') }}"  class="btn btn-danger text-white delete_all">Delete All</button>


                    </div>
                    <div class="pb-20">
                        <table class="checkbox-datatable table nowrap">
                            <thead>
                            <tr>
                                <th>
                                    <div class="dt-checkbox">
                                        <input
                                            type="checkbox"
                                            name="select_all"
                                            value="1"
                                            id="master"
                                        />
                                        <span class="dt-checkbox-label"></span>
                                    </div>
                                </th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subscripe At</th>
                                <th>Actions</th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($subscriptions as $subscripe)
                            <tr>
                                <td><input type="checkbox" class="sub_chk" data-id="{{$subscripe->id}}"></td>
                                <td>{{$loop->iteration}}</td>

                                <td>{{$subscripe->name}}</td>
                                <td>{{$subscripe->email}}</td>


                                <td>{{date_format($subscripe->created_at,'Y-m-d')}}</td>
                                <td>
                                    <a href="{{route('subscripe.destroy',$subscripe->id)}}" data-confirm-delete="true" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>

                                </td>

                            </tr>





                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>







@endsection



@section('js')


    <!-- Datatable Setting js -->
    <script src="{{asset('dashboard/vendors/scripts/datatable-setting.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {


            $('#master').on('click', function(e) {
                if($(this).is(':checked',true))
                {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked',false);
                }
            });


            $('.delete_all').on('click', function(e) {


                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });


                if(allVals.length <=0)
                {
                    alert("Please select row.");
                }  else {


                    var check = confirm("Are you sure you want to delete this row?");
                    if(check == true){


                        var join_selected_values = allVals.join(",");



                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids='+join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    toastr.success(data['success'])

                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });


                        $.each(allVals, function( index, value ) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });


            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.trigger('confirm');
                }
            });


            $(document).on('confirm', function (e) {
                var ele = e.target;
                e.preventDefault();


                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });


                return false;
            });
        });
    </script>


@endsection
