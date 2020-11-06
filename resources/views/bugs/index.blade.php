@extends('layouts.dashboard')

@section('title','Bugs')


@section('content')
    <div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">

            <div class="card" style="margin: 2rem;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            @if(Auth::user()->user_group=='Manager')
                            <h4 class="card-title">All Bugs Reported</h4></div>
                                @endif
                        @if(Auth::user()->user_group=='Test Engineer')
                                    <h4 class="card-title">Bugs Reported</h4></div>
                                @endif
                        @if(Auth::user()->user_group=='Developer')
                                    <h4 class="card-title">Bugs Assigned</h4></div>
                                @endif

                    <div class="col-md-3">
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" id="search_bug" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Id
                            </th>
                            <th>
                                Priority
                            </th>
                            <th>
                                Bug Title
                            </th>

                            <th>
                                Created
                            </th>
                            <th>
                                Reporter
                            </th>
                            <th>
                                Dev Assigned
                            </th>
                            <th>
                                Due Date
                            </th>

                            <th class="text-right">
                                Status
                            </th>
                            <th>
                                Action
                            </th>
                            </thead>

                            <tbody id="dynamic_data">
                            @if(count($bugs) < 1)
                                <tr>
                                    <td>No bugs found</td>
                                </tr>
                            @else
                                    @foreach($bugs as $bug)
                                        <tr>
                                            <td>{{$bug->id}}></td>
                                            <td>{{$bug->priority}}</td>
                                            <td>{{$bug->title}}</td>
                                            <td>{{$bug->created_at}}</td>
                                            <td>{{$bug->reporter}}</td>
                                            <td>{{$bug->assigned}}</td>
                                            <td>{{$bug->due_date}}</td>
                                            <td>{{$bug->status}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{route('bugs.show',$bug->id)}}">Show</a>
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

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    {!! $chart->script() !!}

    <script>
        $('body').on('keyup','#search_bug', function () {
            var Query = $(this).val();
           //console.log(Query)

            $.ajax({
                method: "POST",
                url : '{{route('search_bugs')}}',
                dataType: 'json',
                data : {
                    '_token' : '{{ csrf_token() }}',
                    Query: Query
                },
                success : function (res) {
                    //console.log(res)
                    var tableRow = '';

                    $('#dynamic_data').html('');

                    $.each(res, function (index, value) {
                        var bugUrl = '/bugs/'+value.id;
                       tableRow =  '<tr>' +
                           '<td>'+ value.id +'</td>' +
                           '<td>'+ value.priority +'</td>' +
                           '<td>'+ value.title+'</td>' +
                           '<td>'+ value.created_at+'</td>' +
                           '<td>'+ value.reporter+'</td>' +
                           '<td>'+ value.assigned+'</td>' +
                           '<td>'+ value.due_date+'</td>' +
                           '<td>'+ value.status+'</td>' +
                           '<td><a class="btn btn-sm btn-success" href="'+bugUrl+'" style="color:white">Show</a> </td>' +


                           '</tr>';

                       $('#dynamic_data').append(tableRow);
                    });
                }
            });
        }) ;
    </script>
@endsection