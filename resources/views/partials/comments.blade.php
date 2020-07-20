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

                                        <p><b>Attachments :</b>
                                            <a href="#" class="link-black text-sm" s><i class="fas fa-link mr-1"></i>{{$comment->url}}</a>
                                            <img class="img-fluid" src="../../uploads/attachments/{{$comment->attachments}}" style="height:250px;width:400px">
                                            {{--<ul>--}}
                                                {{--@foreach($comment->attachments as $attachment)--}}
                                                    {{--<li>{{$attachment}}</li>--}}
                                                    {{--@endforeach--}}

                                            {{--</ul>--}}
                                        </p>
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