@extends('layouts.master')

@section('title')
    Bugs | Admin
@endsection


@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin: 2rem">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title"> List of Bugs Reported</h4></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="bg_table">
                                    <thead class=" text-primary">
                                    <th></th>
                                    <th>
                                        Bug Title
                                    </th>
                                    <th>
                                        Priority
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
                                    <th width="180px">

                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($bugs as $indexKey => $bug)
                                        <tr>
                                            <td><b>{{$indexKey+1}}.</b></td>
                                            <td>{{$bug->title}}</td>
                                            <td>{{$bug->priority}}</td>

                                            <td>{{$bug->created_at}}</td>
                                            <td>{{$bug->reporter}}</td>
                                            <td>{{$bug->assigned}}</td>
                                            <td>{{$bug->due_date}}</td>
                                            <td class="text-fuchsia text-right">{{$bug->status}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{url('admin/bg_details/'.$bug->id)}}">Details</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>


                            </div>
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
            $('#bg_table').DataTable({
                "lengthMenu":[[5,10,15,20,-1],[5,10,15,20,"All"]],
                "searching":      true,
                "ordering":       true,
            });
        });
    </script>
@endsection