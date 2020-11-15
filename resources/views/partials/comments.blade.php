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
                                    <div class="comment-container">
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../uploads/avatars/{{$comment->user->avatar}}" alt="user image">
                                                <span class="username">
                                                            <a href="#">{{$comment->user->name.' '.$comment->user->lastname}} </a>
                                                         </span>
                                                <span class="description">Shared publicly - {{$comment->created_at}}</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                {{$comment->body}}
                                            </p>
                                            <p> <b> Url:</b>{{$comment->url}}</p>
                                            @if(is_countable($comment->attachments) && count($comment->attachments) < 1)

                                            @else
                                                <p><b>Attachments :</b>

                                                    <a href="../../uploads/attachments/{{$comment->attachments}}" target="_blank" class="link-black text-sm"><i class="fas fa-link mr-1"></i>{{$comment->attachments}}</a>
                                                    <img class="img-fluid" src="../../uploads/attachments/{{$comment->attachments}}" alt="..." l style="height:150px;width:250px" >

                                                    {{--<ul>--}}
                                                    {{--@foreach($comment->attachments as $attachment)--}}
                                                    {{--<li>{{$attachment}}</li>--}}
                                                    {{--@endforeach--}}

                                                    {{--</ul>--}}
                                                </p>
                                            @endif
                                            @if(Auth::user()->id == $comment->user_id )

                                                <a href="" class="link-black text-sm" onclick="$(this).next('div').slideToggle(1000);return false"><i class="fas fa-edit"></i>Edit Comment</a>
                                                {{--Update Comment Div--}}
                                                <div style="display: none">
                                                    <form action="{{route('comments.update',$comment->id)}}" method="POST">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_method" value="put">
                                                        <input type="hidden" name="comment_id "value="{{$comment->id}}">
                                                        <div class="form-group">
                                                            <label for="comment-content">Comment</label>
                                                            <textarea required placeholder="Enter comment"
                                                                      style="resize: vertical "
                                                                      id="comment-body"
                                                                      name="body"
                                                                      rows="2" spellcheck="false"
                                                                      class="form-control autosize-target text-left" >{{$comment->body}}
                                                                </textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="comment-content"> Attachment Url</label>
                                                            <input type="text"
                                                                   style="resize:vertical"
                                                                   id="comment-attach"
                                                                   name="url"
                                                                   value="{{$comment->url}}"
                                                                   class="form-control autosize-target text-left">
                                                            &nbsp;
                                                        </div>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                                                        </div>
                                                    </form>

                                                </div>



                                                <a style="cursor: pointer;"  class="delete-comment link-black text-sm" token="{{ csrf_token() }}" comment-did="{{ $comment->id }}"><i class="fas fa-trash"></i>Delete Comment</a>

                                            @endif


                                        </div>
                                        <hr>
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