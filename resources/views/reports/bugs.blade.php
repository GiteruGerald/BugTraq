@extends('layouts.dashboard')

@section('title')
    Reports
@endsection


@section('content')
    <div class="content-wrapper">

        <div class="row ">
            <div class="col-md-12">
                <div class="card" style="margin: 2rem;">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Bug Status Distribution
                        </h3>
                    </div>
                    <div class="card-body chrt">
                        {!! $chart->container() !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin: 2rem;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">

                                <h4 class="card-title">Bugs Reports</h4>
                            </div>
                            <div class="col-md-3">
                                {{--<a class="pull-right btn btn-primary btn-sm" href="{{url('pdfexport')}}">Export to PDF </a>--}}
                                <form action="{{url('bug_pdf_export')}}" method="post" enctype="multipart/form-data">
                                    {{{csrf_field()}}}
                                    <input type="hidden" name="bug_data" id="bugData">
                                    <input type="hidden" name="chart_data" id="chartData">
                                    <input class="pull-right btn btn-primary btn-sm" type="submit" value="Export to PDF">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bug_tbl">
                        <div class="table-responsive">
                            <table class="table_bugs">
                                <thead class=" text-primary">
                                <th>
                                    #
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

                                <th>
                                    Status
                                </th>
                                </thead>
                                <tbody>
                                @if(count($bugs) < 1)
                                    <tr>
                                        <td colspan="3">No bugs found</td>
                                    </tr>
                                @else
                                    @foreach($bugs as $cnt => $bug)

                                        <tr>
                                            <td><b>{{$cnt+1}}.</b></td>
                                            <td>{{$bug->priority}}</td>
                                            <td>{{$bug->title}}</td>
                                            <td>{{$bug->created_at}}</td>
                                            <td>{{$bug->reporter}}</td>
                                            <td>{{$bug->assigned}}</td>
                                            <td>{{$bug->due_date}}</td>
                                            <td>{{$bug->status}}</td>
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

    </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>--}}
    <script>
        setTimeout(function () {
            let bugsData = $('.bug_tbl').html();
            let chartsData = $('.chrt').html();
            $('#chartData').val(chartsData);
            $('#bugData').val(bugsData);
        },1000);
    </script>
    {!! $chart->script() !!}

@endsection