<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bug Report</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
            background-color: gray

        }
        .gray {
            background-color: lightgray
        }
    </style>

</head>
<body>

<table width="100%">
    <tr>
        <td align="left">
            <h2>BugTraq</h2>

            <pre>
                 <h4>Bug Information: <span class="gray">{{strtoupper($bug->title)}}</span>  </h4>
                 <p>{{$bug->description}}</p>
            </pre>
        </td>
    </tr>

</table>
<hr>
<table width="100%" style="margin-top: 2rem">
    <tr>
        <td><strong>Project:</strong> {{$bug->projects->pj_name}}</td>
        <td><strong>Status: </strong>{{$bug->status}}</td>
    </tr>
    <tr>
        <td><strong>Priority:</strong> {{$bug->priority}}</td>
        <td><strong>Classification: </strong>{{$bug->type}}</td>
    </tr>



    <tr>
        <td><strong>Assigned To:(Dev)</strong> {{$bug->assigned}}</td>
        <td><strong>Reported by: </strong>{{$bug->reporter}}</td>
    </tr>
    <tr>
        <td><strong>Date Reported:</strong> {{$bug->created_at}}</td>
        <td><strong>Date Modified: </strong>{{$bug->updated_at}}</td>
    </tr>


</table>


</body>
</html>