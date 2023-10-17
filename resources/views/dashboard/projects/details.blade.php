@extends('dashboard.layouts.master')

@section('title')

     {{$project->title}} Project
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
                                <h4>{{$project->title}}</h4>
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
                                         {{$project->title}}
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
                        <h5 class="my-3">Slider Images</h5>
                        <br>
                        <button class="btn btn-info" data-toggle="modal" data-target="#AddProjectAttachmentModal"><i class="fa fa-plus"></i> Add new</button>
                        <a href="{{ route('projects.index') }}"  class="btn btn-dark text-white">Back</a>

                    </div>

                    <div class="pb-20 container">

                        <table class="checkbox-datatable table stripe hover nowrap">
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
                                <th>File</th>
                                <th>Actions</th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($project->attachments as $item)
                                <tr>
                                    <td><input type="checkbox" class="sub_chk" data-id="{{$project->id}}"></td>

                                    <td>{{$loop->iteration}}</td>

                                    <td>
                                        <img src="{{asset('uploads/projects/'.$item->file)}}" style="max-width: 80px;" class="img-fluid" alt="" srcset="">
                                    </td>
                                    <td>

                                        <button class=" btn-primary btn-sm" data-toggle="modal" data-target="#EditProjectAttachmentModal{{$item->id}}"> <i class="fa fa-edit"></i> Edit</button>
                                        <a href="{{route('project.attach.delete',$item->id)}}" class=" btn-danger btn-sm" data-confirm-delete="true"> <i class="fa fa-trash"></i>  Delete</a>

                                    </td>

                                </tr>




                                <!-- Edit project attachment Modal -->
                                <div class="modal fade" id="EditProjectAttachmentModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Attachment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('project.attach.update',$item->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <input type="file"  name="file" class="form-control" required>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
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

    <div class="main-container" style="padding-top:20px !important; ">




        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="card-box mb-30">

                    <div class="pd-20">
                        <h5 >Delivered Items</h5>
                        <br>
                        <button class="btn btn-info" data-toggle="modal" data-target="#AddProjectDetailsModal"><i class="fa fa-plus"></i> Add new</button>
                    </div>

                    <div class="pb-20 container">

                        <table class="checkbox-datatable table stripe hover nowrap">
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
                                <th>Item</th>
                                <th>Actions</th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($project->projectDetails as $item)
                                <tr>
                                    <td><input type="checkbox" class="sub_chk" data-id="{{$project->id}}"></td>

                                    <td>{{$loop->iteration}}</td>

                                    <td>{{$item->item_delivered}}</td>
                                    <td>

                                        <button class=" btn-primary btn-sm" data-toggle="modal" data-target="#EditProjectDetailsModal{{$item->id}}"> <i class="fa fa-edit"></i> Edit</button>
                                        <a href="{{route('project.details.delete',$item->id)}}" class=" btn-danger btn-sm" data-confirm-delete="true"> <i class="fa fa-trash"></i>  Delete</a>

                                    </td>

                                </tr>




                                <!-- edit item details Modal -->
                                <div class="modal fade" id="EditProjectDetailsModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Item delevired</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('project.details.update',$item->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <input value="{{$item->item_delivered}}" type="text" name="item" class="form-control" required>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
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



    <!-- Add item details Modal -->
    <div class="modal fade" id="AddProjectDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Item delevired</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('project.details.store',$project->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="item" class="form-control" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Add project attachment Modal -->
    <div class="modal fade" id="AddProjectAttachmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Attachment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('project.attach.store',$project->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file"multiple  name="files[]" class="form-control" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
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
