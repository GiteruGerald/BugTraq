<div class="row">
    <div class="col-12">
        <div class="card" style="margin-left: 3rem;">
            <div class="card-header">
                <h3 class="card-title">Recent Activity</h3>

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
                                @foreach($comments as $comment)
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../uploads/avatars/{{$comment->user->avatar}}" alt="user image">
                                            <span class="username">
                                                            <a href="/users/{{$comment->user->id}}">{{$comment->user->name.' '.$comment->user->lastname}} </a>
                                                         </span>
                                            <span class="description">Shared publicly - {{$comment->created_at}}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            {{$comment->body}}
                                        </p>
                                        @if(is_countable($comment->attachments) && count($comment->attachments) < 1)
php
                                        @else
                                            <p><b>Attachments :</b>
                                                <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i>{{$comment->url}}</a>
                                                <img class="img-fluid" src="../../uploads/attachments/{{$comment->attachments}}" alt="..." l style="height:150px;width:250px" onmouseover="bigImg(this)" onmouseout="normalImg(this)">
                                                {{--<ul>--}}
                                                {{--@foreach($comment->attachments as $attachment)--}}
                                                {{--<li>{{$attachment}}</li>--}}
                                                {{--@endforeach--}}

                                                {{--</ul>--}}
                                            </p>
                                        @endif
                                        @if(Auth::user()->id == $comment->user_id )
                                            <a href="#update_comment" class="link-black text-sm" data-toggle="modal" ><i class="fas fa-eraser mr-1"></i>Edit Comment</a>
                                            {{--Update Comment modal--}}
                                                    <div class="modal fade" id="update_comment" >
                                                        <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Comment</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!--TODO : fix Update Comment-->
                                                                <form action="{{route('comments.update',$comment->id)}}" method="POST">
                                                                        {{csrf_field()}}
                                                                    <input type="hidden" name="_method" value="put">
                                                                    <input type="hidden" name="comment_id "value="{{$comment->id}}">
                                                                    <div class="form-group">
                                                                        <label for="comment-content">Comment</label>
                                                                        <textarea required placeholder="Enter comment"
                                                                                  style="resize: vertical "
                                                                                  id="comment-content"
                                                                                  name="body"
                                                                                  rows="2" spellcheck="false"
                                                                                  class="form-control autosize-target text-left" >{{$comment->body}}
                                                                </textarea>
                                                                    </div>
                                                                    <div class="form-control-file">
                                                                        <label for="comment-content"> Attachement Url</label>
                                                                        <input type="text"
                                                                               style="resize:vertical"
                                                                               id="comment-content"
                                                                               name="url"

                                                                               class="form-control autosize-target text-left">
                                                                        &nbsp;
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                                                                    </div>
                                                                </form>

                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    </div>
                                            <a href="#" class="link-black text-sm"
                                               onclick="
                                                var result=confirm('Are you sure yoo wish to delete this Comment?');
                                                if(result){
                                                event.preventDefault();
                                                document.getElementById('delete-comment').submit();

                                                }
                                                "><i class="fas fa-trash mr-1"></i>
                                                Delete comment</a>
                                                <form id="delete-comment" action="{{route('comments.destroy',[$comment->id])}}"
                                                      method="POST" style="display:none;">
                                                    <input type="hidden" name="_method" value="delete">
                                                    {{csrf_field()}}
                                                </form>

                                        @endif


                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

</div>