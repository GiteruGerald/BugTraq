<!DOCTYPE html>
<html>
<head>
    <title> Print Reports</title>
</head>
<body>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 3px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    @isset($data)
    <h1>Bugs Report</h1>
    <div align="center">


        {!! $data !!}


    </div>
        @endisset

    @isset($projects)
        <h1>Projects Report</h1>
        <div>
            <table class="table">
                <thead>
                <tr class="table-danger">
                    <th>
                        Name
                    </th>

                    <th>
                        Type
                    </th>
                    <th>
                        Issues
                    </th>
                    <th>
                        Manager
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Created On
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                        <tr>
                            <td>{{$project->pj_name}}</td>
                            <td>{{$project->pj_type}}</td>
                            {{--TODO : Check this count function huh--}}
                            <td> {{count($project->bugs->toArray())}} </td>
                            <td>{{$project->owner}}</td>
                            <td>{{$project->status}}</td>

                            <td class="text-right">{{$project->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        @endisset
</body>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>--}}
{{--{!! $chart->script() !!}--}}

</html>