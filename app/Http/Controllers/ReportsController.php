<?php

namespace App\Http\Controllers;

use PDF;
use App\Bug;
use App\Project;
use App\User;
use App\Charts\BugChart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    //
    public function bugs(){

        //To get the chart
        $bug = DB::table('bugs')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total','status');
//        return $bug->keys();

        //return $bug->values();
        $chart = new BugChart;
        $chart->labels($bug->keys());

        $chart->dataset('My dataset 1', 'pie', $bug->values())
            ->options([
                'color' => '#c2ab0f',
                'backgroundColor' => ['#42f56f','#c2ab0f','#007bff','#ff0040','#4e35b5'],
            ]);

        //To retrieve all bugs
        $bugs = Bug::all();

        return view('reports.bugs',compact ('bugs', 'chart'));

    }

    public function projects(){

        $projects = Project::all();

        return view('reports.projects', ['projects'=>$projects]);
    }

    public function bug_export(Request $request){

        //To get the chart
        $bug = DB::table('bugs')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total','status');
        //return $bug->keys();

        //return $bug->values();
        $chart = new BugChart;
        $chart->labels($bug->keys());

        $chart->dataset('My dataset 1', 'pie', $bug->values());


//       dd($request->all());
//        $chart = $request->input('chart_data');
        $data = $request->input('bug_data');
        $pdf = PDF::loadView('reports/temp',compact('data','chart'));
//        return $pdf->download('bugs.pdf');
        return $pdf->stream('bugs.pdf');
    }

    public function  pdf_bug($id){
        $bug = Bug::find($id);
        //dd($bug);
        $pdf = PDF::loadView('reports/pdf',compact('bug'));


       return $pdf->stream();
    }

    public function convert_projects_data_to_html(){
        $project_data = Project::all();

        $output ='
        <table class="table">
                            <thead class=" text-primary">
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
                            <th class="text-right">
                                Created On
                            </th>

                            </thead>
                            <tbody>
        ';
        foreach ($project_data as $project){
            $output .='
                <tr>
                     <td>'.$project->pj_name.'</td>
                     <td>'.$project->pj_type.'</td>
//                      Todo: Check this count function huh
                     <td>'.count($project->bugs->toArray()).'</td>
                     <td>'.$project->owner.'</td>
                     <td class="text-right">'.$project->created_at.'</td>
                   </tr>
            ';
        }
        $output .= '</table>';
        return $output;
    }

}
