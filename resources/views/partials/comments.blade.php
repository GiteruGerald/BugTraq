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
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                                            <a href="/users/{{$comment->user->id}}">{{$comment->user->name.' '.$comment->user->lastname}} </a>
                                                         </span>
                                            <span class="description">Shared publicly - {{$comment->created_at}}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            {{$comment->body}}
                                        </p>

                                        <p><b>Proof :</b>
                                            <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i>{{$comment->url}}</a>
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