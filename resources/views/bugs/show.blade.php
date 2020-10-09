@extends('layouts.dashboard')
@section('title')
    Bugs | BugTraq
@endsection

@section('content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="margin-left: 3rem;margin-top: 2rem">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4 class="card-title"><strong>{{$bug->title}}</strong> :Bug Information</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">

                                    <div class="form-body">


                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-5">Assigned To:</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static"> {{$bug->assigned}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-5">Due On:</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$bug->due_date}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-5">Project:</label>
                                                        <div class="col-md-7">
                                                            @if($bug->projects)
                                                                <p class="form-control-static">{{$bug->projects->pj_name}}</p>
                                                            @else
                                                                <p class="form-control-static text-danger">Cannot be retrieved</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        {{--TODO: Reveiw this section please based on authentication--}}
                                                        <label class="control-label text-right col-md-5">Status:</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$bug->status}}</p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->

                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-5">Priority:</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$bug->priority}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-5">Classification:</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$bug->type}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            {{--TODO - show error when date is later than expected completion date--}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-5">Created:</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$bug->created_at}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-5">Updated:</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$bug->updated_at}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-5">Reported by:</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$bug->reporter}}</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-5">Description:</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">{{$bug->description}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                &nbsp;
                &nbsp;
                <!--For Bug Comments-->
            @include('partials.comments')



            <!--To add comments-->
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="margin-left: 3rem;">
                            <div class="card-header">
                                <h3 class="card-title">Add Comment</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">

                                        <div class="row">
                                            <div class="col-12">
                                                <form method ="post" action="{{route('comments.store')}}" enctype="multipart/form-data">
                                                    {{csrf_field()}}
<!-- TODO: Validate if not empty -->
                                                    <input type="hidden" name="commentable_type" value="App\Bug">
                                                    <input type="hidden" name="commentable_id" value="{{$bug->id}}">

                                                    <div class="form-group">
                                                        <label for="comment-content">Comment.</label>
                                                        <textarea  placeholder="Enter comment"
                                                                  style="resize: vertical "
                                                                  required
                                                                  id="comment-content-body"
                                                                  name="body"
                                                                  rows="2" spellcheck="false"
                                                                  class="form-control autosize-target text-left" >
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="url">Url:</label>
                                                        <input type="text" class="form-control" name="url">
                                                    </div>
                                                    <div class="form-control-file">
                                                        <label for="comment-attach">Attachments(Docs/Photos)</label>
                                                        <input type="file"
                                                                  style="resize:vertical"
                                                                  id="comment-attachment"
                                                                  name="attachment"

                                                                  class="form-control autosize-target text-left">

            &nbsp;                                          </div>

                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary"
                                                               value="Post Comment"/>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--Start of Sidebar-->
            <div class="col-sm-3 col-md-3 col-lg-3 pr-4 pt-5 pull-right">
                <div class="sidebar-module sidebar-module-inset">
                    <div class="sidebar-module">

                        <h4>Actions</h4>
                        <br class="list-unstyled">
                        @if(Auth::user()->user_group =='Manager')
                            <li><a href="#edit-bug" data-toggle="modal"><i class="fas fa-edit"></i>Edit</a></li>
                            <li><a href="{{url('reports/pdfexport/'.$bug->id)}}"><i class="fas fa-print"></i>Print Bug details </a></li>
                            </br>
                            <li><a href="#" onclick="
                            var  result=confirm('You are about to delete this bug, proceed?')
                                if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-bug').submit();
                                }


                                ">
                                    <i class="fas fa-trash"></i>Delete Bug
                                </a>
                                <form id="delete-bug" action="{{route('bugs.destroy',$bug->id)}}"
                                      method="POST" style="display:none">
                                    <input type="hidden" name="_method" value="delete">
                                    {{csrf_field()}}
                                </form>
                            </li>
                        @else
                            <li><a href="{{url('reports/pdfexport/'.$bug->id)}}"><i class="fas fa-print"></i>Print Bug details </a></li>
                        @endif
                            <li><i class="fas fa-paperclip"></i> Attachments</li>

                        <br/>
                        </ol>

                    </div>


                </div><!--end of sidebar-->
            </div>
        </div>






        </div><!-- end of major row-->
    <div class="modal fade" id="edit-bug">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <strong>{{$bug->title}}</strong> Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('bugs.update',$bug->id)}}" method="POST">

                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put">


                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="bugType">Select TYPE</label>
                                    <select class="form-control" name="bug_type" required>
                                        <option value="{{$bug->type}}">{{$bug->type}}</option>
                                        <option>Functional</option>
                                        <option>Communication
                                        <option>Missing Commands</option>
                                        <option>Syntactic</option>
                                        <option>Error handling</option>
                                        <option>Calculation</option>
                                        <option>Control flow</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-1">
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="Assigned">Assign To:(Dev)</label>
                                    <select class="form-control" name="dev" value="{{$bug->assigned}}">

                                        @foreach($devs as $dev)
                                            <option value="{{$dev->name.' '.$dev->lastname}}">{{$dev->name.' '.$dev->lastname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="bugType">Select Priority</label>
                                    <select class="form-control" name="priority">
                                        <option value="{{$bug->priority}}">{{$bug->priority}}</option>
                                        <option>Major</option>
                                        <option>Medium</option>
                                        <option>Minor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label>Due Date:</label>

                                    <div class="input-group">
                                        <input type="date" name="due_date" value="{{$bug->due_date}}" class="form-control float-right" id="reservation" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="bugType">Change Status</label>
                                    <select class="form-control" name="status">
                                        <option value ="{{$bug->status}}">{{$bug->status}}</option>
                                        <option value="In Progress (By Dev)">In Progress (By Dev)</option>
                                        <option value="In Review(By QA)">In Review(By QA)</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Complete">Complete</option>
                                        <option value="Deferred">Deferred</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Complete">Complete</option>
                                        <option value="Deferred">Deferred</option>
                                        <option value="Rejected">Rejected</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--TODO : add attachment section -->
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label>Bug Description</label>
                                    <textarea class="form-control" rows="2" name="description"  required>{{$bug->description}}</textarea>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    </div><!--end of content wrapper -->
    <!--TODO:Check this go to top page-->
    <!--   <footer class="text-muted">
            <div class="container">
                <p class="float-center">
                    <a href="#">Back to top</a>
                </p>
                <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
                <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="/docs/4.2/getting-started/introduction/">getting started guide</a>.</p>
            </div>
        </footer>
    -->

@endsection
@section('scripts')
    <!-- <script src="../../assets/demo/demo.js"></script> -->
    <script>
        // function bigImg(x) {
        //     x.style.height = "500px";
        //     x.style.width = "1000px";
        // }
        //
        // function normalImg(x) {
        //     x.style.height = "150px";
        //     x.style.width = "250px";
        // }
    </script>

    <!-- LightBox -->
    <script defer>
        const lightbox = document.createElement('div')
        lightbox.id = 'lightbox'
        document.body.appendChild(lightbox)

        const images = document.querySelectorAll('img.img-fluid')
        images.forEach(image =>{
            image.addEventListener('click', e =>{
                lightbox.classList.add('active')
                const img = document.createElement('img')
                img.src = image.src
                while(lightbox.firstChild){
                    lightbox.removeChild(lightbox.firstChild)
                }
                lightbox.appendChild(img)
            })
        })

        lightbox.addEventListener('click', e =>{
            if(e.target !==  e.currentTarget) return
            lightbox.classList.remove('active')
        })
    </script>

    <script>


        $(".comment-container").delegate(".delete-comment","click",function(){
            if (confirm("Are you sure you want to delete this..!")) {
                var cdid = $(this).attr("comment-did");
                var token = $(this).attr("token");
                var well = $(this).parent().parent();
                $.ajax({
                    url: "/comments/" + cdid,
                    method: "POST",
                    data: {_method: "delete", _token: token},
                    success: function (response) {
                        if (response == 1 || response == 2) {
                            well.hide();
                            alert('Comment Deleted successfully');
                        } else {
                            alert('Oh ! you can delete only your comment');
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>





    <script src="../../../public/plugins/jquery/jquery.min.js"></script>
@endsection