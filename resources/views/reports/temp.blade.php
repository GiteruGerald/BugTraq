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
    <h1>Bugs Report</h1>
    <div align="center">


        {!! $data !!}


    </div>
</body>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>--}}
{!! $chart->script() !!}

</html>