@if (session()->has('success'))
    <div class="col-md-9">
    <div class="alert alert-dismissable alert-success fade show" style="margin-top: 5rem;margin-left: 16rem">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('success') !!}
        </strong>
    </div>
    </div>
    @endif