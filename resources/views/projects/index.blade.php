@extends('layouts.dashboard')

@section('title')
    Projects | BugTraq
@endsection


@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                 <div class="card" style="margin: 2rem;">
                    <div class="card-header">
                        <div class="row">
                            @if(Auth::user()->user_group=='Manager')
                            <div class="col-md-7">
                                    <h4 class="card-title"> Your Projects</h4>
                               </div>

                            <div class="ml-5">
                                        <a class="pull-right btn btn-primary btn-sm" href="/projects/create">Create new </a>
                                    </div>
                            <div class="col-md-3">
                            <form class="form-inline ml-3">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" id="search_projects" placeholder="Search" aria-label="Search">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                                {{--<div class="input-group mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">--}}
                                    {{--<label for="name" class="col-md-4 control-label">First Name</label>--}}
                                    {{--<input id="name" value="{{ old('name') }}"  name="name" type="text" class="form-control" placeholder="First name" required autofocus>--}}

                                    {{--<div class="input-group-append">--}}
                                        {{--<div class="input-group-text">--}}
                                            {{--<span class="fas fa-user"></span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--@if($errors->has('name'))--}}
                                        {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}

                            </div>

                        </div>


                                @else
                            <div class="col-md-9">
                                    <h4 class="card-title"> Projects Assigned</h4>
                            </div>
                                <div class="col-md-3">
                                    <form class="form-inline ml-3">
                                        <div class="input-group input-group-sm">
                                            <input class="form-control form-control-navbar" type="search" id="search_project"   placeholder="Search" aria-label="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-navbar" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        </div>
                                @endif

                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Name
                                </th>

                                <th>
                                    Type
                                </th>
                                @if(Auth::user()->user_group=='Manager')
                                    <th>
                                    Issues
                                </th>
                                    @endif
                                @if(Auth::user()->user_group=='Test Engineer' || Auth::user()->user_group=='Developer')
                                <th>
                                    Manager
                                </th>
                                @endif
                                <th class="text-right">
                                    Created On
                                </th>
                                <th width="180px">
                                    Action
                                </th>
                                </thead>
                                <tbody id="dynamic_data">
                                @if(count($projects) < 1)
                                    <tr>
                                        <td>No projects found</td>
                                    </tr>
                                @else
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{$project->pj_name}}</td>
                                        <td>{{$project->pj_type}}</td>
                                    @if(Auth::user()->user_group=='Manager')

                                        <td> {{count($project->bugs->toArray())}} </td>
                                        @endif
                                     @if(Auth::user()->user_group=='Test Engineer' || Auth::user()->user_group=='Developer')
                                        <td>{{$project->owner}}</td>
                                     @endif
                                        <td class="text-right">{{$project->created_at}}</td>
                                        <td>

                                        <a class="btn btn-sm btn-success" href="{{route('projects.show',$project->id)}}">Show</a>
                                            @if(Auth::user()->user_group=='Manager')
                                        <a class="btn btn-sm btn-warning" href="{{route('projects.edit',$project->id)}}">Edit</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('body').on('keyup','#search_projects', function () {
            var Query = $(this).val();
            //console.log(Query)
            $.ajax({
               method: "POST",
                url: '{{ route('search_projects') }}',
                dataType: 'json',
                data: {
                    '_token' : '{{ csrf_token() }}',
                    Query : Query
                },
                success: function (res) {
                    var tableRow = '';

                    $('#dynamic_data').html('');

                    $.each(res, function (index, value) {

                        var pjUrl = '/projects/'+value[0].id;
                        var pjEditUrl = '/projects/'+ value[0].id +'/edit';

                        tableRow = '<tr>' +
                            '<td>'+value[0].pj_name+'</td>' +
                           '<td>'+value[0].pj_type+'</td>' +
                           '<td>'+res[1]+'</td>' +
                           '<td class="text-right">'+value[0].created_at+'</td>' +

                            '<td>' +
                                '<a class="btn btn-sm btn-success" href="'+pjUrl+'" style="color:white">Show</a>' +
                                '<a class="btn btn-sm btn-warning" href="'+pjEditUrl+'">Edit</a>' +

                            ' </td>' +

                           '</tr>';

                        $('#dynamic_data').append(tableRow);

                    });
                }
            });
        });
        $('body').on('keyup','#search_project', function () {
            var Query = $(this).val();
            //console.log(Query)
            $.ajax({
                method: "POST",
                url: '{{ route('search_projects') }}',
                dataType: 'json',
                data: {
                    '_token' : '{{ csrf_token() }}',
                    Query : Query
                },
                success: function (res) {
                    var tableRow = '';

                    $('#dynamic_data').html('');

                    $.each(res, function (index, value) {

                        var pjUrl = '/projects/'+value.id;

                        tableRow = '<tr>' +
                            '<td>'+value.pj_name+'</td>' +
                            '<td>'+value.pj_type+'</td>' +
                            '<td>'+value.owner+'</td>' +
                            '<td class="text-right">'+value.created_at+'</td>' +
                            '<td>' +
                            '<a class="btn btn-sm btn-success" href="'+pjUrl+'" style="color:white">Show</a>' +

                            ' </td>' +

                            '</tr>';

                        $('#dynamic_data').append(tableRow);

                    });
                }
            });
        });
    </script>
@endsection