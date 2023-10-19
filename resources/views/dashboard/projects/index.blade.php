@extends('dashboard.layouts.master')

@section('title')

    Our Projects
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
                                    <li class="breadcrumb-item active" aria-current="page">
                                        clients
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
                        <button data-toggle="modal" data-target="#addModal" class="btn btn-info text-white">Add Project</button>
                        <button  data-url="{{ route('delete.all') }}"  class="btn btn-danger text-white delete_all">Delete All</button>


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
{{--                                            id="example-select-all"--}}
                                            id="master"
                                        />
                                        <span class="dt-checkbox-label"></span>
                                    </div>
                                </th>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Is Featured</th>
                                <th>Create At</th>
                                <th>Actions</th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($projects as $project)
                            <tr>
                                <td><input type="checkbox" class="sub_chk" data-id="{{$project->id}}"></td>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a href="{{$project->url}}" target="_blank">
                                        <img src="{{asset('uploads/projects/'.$project->home_img)}}" style="max-width: 60px;border-radius: 4px" alt="" srcset="">
                                    </a>
                                </td>
                                <td>{{$project->title}}</td>
                                <td>{{$project->category}}</td>
                                <td><span class="badge {{$project->is_featured == 1? 'badge-success':''}}"> {{$project->is_featured == 1? 'Featured':''}}</span></td>
                                <td>{{date_format($project->created_at,'Y-m-d')}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item text-primary" href="{{route('projects.edit',$project->id)}}"> <i class="fa fa-edit"></i> Edit</a>
                                            <a href="{{route('projects.destroy',$project->id)}}" data-confirm-delete="true" class="dropdown-item text-danger"> <i class="fa fa-trash"></i>  Delete</a>
                                            <a class="dropdown-item" href="{{route('project.details',$project->id)}}"> <i class="fa fa-eye"></i> View Project Details</a>
                                        </div>
                                    </div>

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







    <!-- Add Project Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="deleteCheckInputForm" action="{{route('projects.store')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category" class="form-control" required>
                                <option readonly selected> Please select project category</option>
                                <option value="Web Apps">Web Apps</option>
                                <option value="Mobile App">Mobile App</option>
                                <option value="UI/UX">UI/UX</option>
                                <option value="Planing">Planing</option>
                                <option value="Technical Writing">Technical Writing</option>
                            </select>
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea cols="3" id="description" name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="write desc about project..."></textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="url">URL:</label>
                                    <input type="text" id="url" name="url" class="form-control @error('url') is-invalid @enderror">
                                    @error('url')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="url" for="is_featured">Is Feature:</label>
                                    <br>
                                    <input type="checkbox" name="is_featured"  >
                                </div>
                            </div>
                        </div>



                        <div id="repeater">
                            <div class="repeater-heading">
                                <h5 class="pull-left">Delevired Item</h5>
                                <button onclick="event.preventDefault()" class="btn btn-primary btn-sm pull-right repeater-add-btn">
                                    Add
                                </button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="delevired_items">
                                <div class="item-content">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-lg-2 control-label">Item</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control w-100" id="inputName" placeholder="Name" data-name="name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="pull-right repeater-remove-btn">
                                                <button class="btn btn-danger btn-sm remove-btn" style="position: relative;top: 40px">
                                                    Remove
                                                </button>
                                            </div>
                                            <div class="clearfix"></div>

                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="home_img">Project Image:</label>
                            <input type="file" id="home_img" name="home_img" class="form-control-file @error('home_img') is-invalid @enderror">
                           <small class="text-danger">dimentions: 360 x 280</small>
                            @error('home_img')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="files">sliders:</label>
                            <input type="file" id="files" multiple name="files[]" class="form-control-file @error('files') is-invalid @enderror">
                            <small class="text-danger">dimentions: 581 x 581</small>

                            @error('files')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Create</button>
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
