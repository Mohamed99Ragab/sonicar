@extends('dashboard.layouts.master')

@section('title')

    Categories | Sonicar Tech
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
                                <h4>Categories</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Categories
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
                        <button data-toggle="modal" data-target="#addModal" class="btn btn-info text-white">Add Category</button>
                        <button  data-url="{{ route('category.delete.all') }}"  class="btn btn-danger text-white delete_all">Delete All</button>


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
                                <th>Category</th>
                                <th>Actions</th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                            <tr>
                                <td><input type="checkbox" class="sub_chk" data-id="{{$category->id}}"></td>
                                <td>{{$loop->iteration}}</td>

                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('category.destroy',$category->id)}}" data-confirm-delete="true" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                                    <button data-toggle="modal" data-target="#editModal{{$category->id}}"  class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </button>

                                </td>

                            </tr>




                            {{--     edit category Modal --}}
                            <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="deleteCheckInputForm" action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label for="name">Name:</label>
                                                    <input type="text" value="{{$category->name}}" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>






                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>







{{--     Add Category Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="deleteCheckInputForm" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection



@section('js')


    <!-- buttons for Export datatable -->
{{--    <script src="{{asset('dashboard/src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>--}}
{{--    <script src="{{asset('dashboard/src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>--}}
{{--    <script src="{{asset('dashboard/src/plugins/datatables/js/buttons.print.min.js')}}"></script>--}}
{{--    <script src="{{asset('dashboard/src/plugins/datatables/js/buttons.html5.min.js')}}"></script>--}}
{{--    <script src="{{asset('dashboard/src/plugins/datatables/js/buttons.flash.min.js')}}"></script>--}}
{{--    <script src="{{asset('dashboard/src/plugins/datatables/js/pdfmake.min.js')}}"></script>--}}
{{--    <script src="{{asset('dashboard/src/plugins/datatables/js/vfs_fonts.js')}}"></script>--}}
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

    <script src="{{asset('dashboard/src/scripts/repeater.js')}}"></script>
    <script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>
@endsection
