@extends('layouts.master')

@section('title')
    Projects | Admin
@endsection


@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin: 2rem;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title"> List Of Projects</h4></div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="pj_table" class="table">
                                <thead class=" text-primary">
                                <th>

                                </th>
                                <th>
                                    Name
                                </th>

                                <th>
                                    Type
                                </th>
                                <th>
                                    Issues
                                </th>
                                <th>
                                    Manager
                                </th>
                                <th class="text-right">
                                    Created On
                                </th>
                                <th width="180px">
                                    <a><i class="fas fa-atom"></i> </a>
                                </th>
                                </thead>
                                <tbody>
                                @foreach($projects as $indexKey => $project)
                                    <tr class="item{{$project->id}}">
                                        <td class="col1"><b>{{$indexKey +1}}.</b></td>
                                        <td>{{$project->pj_name}}</td>
                                        <td>{{$project->pj_type}}</td>
                                        <td>{{count($project->bugs->toArray())}}</td>
                                        <td>{{$project->owner}}</td>
                                        <td class="text-right">{{$project->created_at}}</td>
                                        <td>
                                                {{--<a class="btn btn-sm btn-success" href="{{url('admin/pj_details/'.$project->id)}}">Details</a>--}}


                                            <button class="show-modal btn-sm btn-success"  data-cnt="{{$indexKey+1 }}" data-id="{{$project->id}}" data-title="{{$project->pj_name}}" data-pjtype="{{$project->pj_type}}" data-count="{{count($project->bugs->toArray())}}" data-manager="{{$project->owner}}" data-desc="{{$project->pj_description}}" data-date="{{$project->created_at}}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="edit-modal btn-sm btn-info" href="#edit_pj" data-cnt="{{$indexKey+1 }}" data-id="{{$project->id}}" data-title="{{$project->pj_name}}" data-pjtype="{{$project->pj_type}}" data-count="{{count($project->bugs->toArray())}}" data-manager="{{$project->owner}}" data-desc="{{$project->pj_description}}" data-date="{{$project->created_at}}">
                                                    <i class="fas fa-pencil-ruler"></i>
                                            </button>
                                            <button class="delete-modal btn-sm btn-warning" href="#delete_pj"  data-id="{{$project->id}}" data-title="{{$project->pj_name}}" data-desc="{{$project->pj_description}}">
                                                <i class="fas fa-trash"></i>
                                            </button>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--TODO : Employ Datatable--}}

                        </div>
                    </div>


                </div>
            </div>

        </div>

        <!-- Show Modal -->
        <div id="show_pj" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                            <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id">ID:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_show" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title">Title:</label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="project_show" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="content">Content:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description_show" cols="40" rows="5" disabled></textarea>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Edit modal Solo -->
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="modal">
                            <input type="hidden" class="form-control" id="pid">
                            <div class="form-group">
                                <label class="control-label col-sm-2"for="title">Title</label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="name_edit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2"for="body">Body</label>
                                <div class="col-sm-10">
                                    <textarea type="name" class="form-control" id="desc_edit"></textarea>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                                <span class='glyphicon glyphicon-check'></span> Edit
                            </button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal form to delete a form -->
        <div id="deleteModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Are you sure you want to delete the following post?</h3>
                        <br />
                        <form class="form-horizontal" role="form">
                            <div class="form-group">

                                    <input type="hidden" class="form-control" id="id_delete" disabled>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="title_delete" disabled>
                                    <p class="text-fuchsia" id="title_delete" ></p>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                                <span id="" class='glyphicon glyphicon-trash'></span> Delete
                            </button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#pj_table').DataTable({
                "lengthMenu":[[5,10,15,20,-1],[5,10,15,20,"All"]],
                "scrollY":       false,
                "scrollCollapse": true,
                "paging":         true,
                "searching":      false,
                "ordering":       true,
            });
        });
        //TODO: Show function  Under review
        $(document).on('click', '.show-modal', function () {
            $('.modal-title').text('Project Details');

            $('#id_show').val($(this).data('id'));
            $('#project_show').val($(this).data('title'));
            $('#description_show').val($(this).data('desc'));
            $('#show_pj').modal('show');



        });

        $(document).on('click','.edit-modal', function () {
            // $('.modal-title').text('Edit');
            // $('#id_edit').val($(this).data('id'));
            // $('#name_edit').val($(this).data('title'));
            // $('#desc_edit').val($(this).data('desc'));
            // $('#edit_pj').modal('show');
        });
        $(document).on('click', '.edit-modal', function() {

            $('.modal-title').text('Edit Project Details');
            $('.deleteContent').hide();
            $('.form-horizontal').show();
            $('#pid').val($(this).data('id'));
            $('#name_edit').val($(this).data('title'));
            $('#desc_edit').val($(this).data('desc'));
            console.log($(this).data('cnt'));
            console.log();
            count = $(this).data('count');
            cnt = $(this).data('cnt');
            $(this).data('manager');
            id = $('#pid').val();
            ajaxurl = 'http://127.0.0.1:8000/admin/projects/' + id;
            console.log(id);
            $('#editModal').modal('show');

        });

        $('.modal-footer').on('click', '.edit',function () {
           $.ajax({
               method: 'PUT',
               {{--url: '{{ route('admin.projects.update',$project->id) }}',--}}
               // url: '../projects/' +id,
               {{--uri: "{{url('admin/projects/',$project->id)}}",--}}
               url : ajaxurl,
                data: {
                   '_token': '{{ csrf_token() }}',
                    'id': $("#pid").val(),
                    'pj_name': $('#name_edit').val(),
                    'desc': $('#desc_edit').val(),

                },
               success: function (data) {
                   if ((data.errors)){
                       if (data.errors.pj_name){
                           console.log("Error with name");
                       }
                       if (data.errors.desc) {
                           console.log("Error with desc");
                       }
                       console.log("nothing");

                   } else {
                       // toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                       console.log(data);
                       $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'>" +
                           "<td class='col1'><b>"+ data.id +".</b></td>" + //TODO :Check this count
                           "<td>" + data.pj_name + "</td>" +
                           "<td>" + data.pj_type + "</td>" +
                           "<td>" + count + "</td>" +
                           "<td>" + data.owner + "</td>" +

                           "<td class='text-right'>" + data.created_at + "</td>" +
                           "<td><button class='show-modal btn-sm btn-success' data-id='" + data.id + "' data-title='" + data.pj_name + "' data-desc='" + data.pj_description + "' data-pj_type='" + data.pj_type + "' data-manager='" + data.manager + "' data-count='" + count + "' data-date='" + data.date + "' >" +
                                    "<i class='fas fa-eye'></i>" +
                                "</button> " +
                                "<button class='edit-modal btn-sm btn-info' data-id='" + data.id + "' data-title='" + data.pj_name + "' data-desc='" + data.pj_description + "' data-pj_type='" + data.pj_type + "' data-manager='" + data.manager + "' data-count='" + count + "' data-date='" + data.date + "' >" +
                                    "<i class='fas fa-pencil-ruler'></i> " +
                                "</button> " +
                                "<button class='delete-modal btn-sm btn-warning' data-id='" + data.id + "' data-title='" + data.pj_name + "' data-desc='" + data.pj_description + "' data-pj_type='" + data.pj_type + "' data-manager='" + data.manager + "' data-count='" + count + "' data-date='" + data.date + "'>" +
                                    "<i class='fas fa-trash'></i>" +
                                "</button>" +
                           "</td></tr>");

                   }



                   // $('.project' + data.id).replaceWith(" "+
                   //     "<tr class='project" + data.id + "'>"+
                   //     "<td>" + data.id + "</td>"+
                   //     "<td>" + data.pj_name + "</td>"+
                   //     "<td>" + data.pj_description + "</td>"+
                   //     "<td>" + data.created_at + "</td>"+
                   //     "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.pj_name + "' data-body='" + data.pj_description + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.pj_name + "' data-body='" + data.pj_description + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.pj_name + "' data-body='" + data.pj_description + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
                   //     "</tr>");
               },
               error: function(error) {
                   console.log(error);
               }
           });
        });

        $(document).on('click','.delete-modal', function () {
            $('.modal-title').text('');
            $('#id_delete').val($(this).data('id'));
            $('#title_delete').val($(this).data('title'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();

        });
        $(document).on('click','.delete',function () {
            $.ajax({
               type: 'DELETE',
               url : 'http://127.0.0.1:8000/admin/projects/destroy/'+id,
                data:{
                   '_token': '{{csrf_token() }}',
                },
                success:function (data) {
                    $('.item' + data['id']).remove();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    })
                }
            });
        })
    </script>
@endsection