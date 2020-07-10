<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Bug;
use App\Project;
use App\User;
use App\Charts\BugChart;
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
        //return $bug->keys();

        //return $bug->values();
        $chart = new BugChart;
        $chart->labels($bug->keys());
        $chart->dataset('My dataset 1', 'pie', $bug->values());

        //To retrieve all bugs
        $bugs = Bug::all();

        return view('reports.bugs',compact ('bugs', 'chart'));

    }

    public function projects(){

        $projects = Project::all();

        return view('reports.projects', ['projects'=>$projects]);
    }

    public function pdf_export(){
        $bug = Bug::all();
        $projects = Project::all();

        //To get the chart


        $pdf = PDF::loadView('reports.pdf',$bug)->setPaper('a4', 'portrait');
        $filename = $bug->title;

        return $pdf->stream($filename.'.pdf');


    }

    public function  pdf(){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->
        convert_projects_data_to_html());

        $pdf->stream();
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
                     {{--TODO : Check this count function huh--}}
                     <td>Fix This</td>
                     <td>'.$project->owner.'</td>
                     <td class="text-right">'.$project->created_at.'</td>
                   </tr>
            ';
        }
        $output .= '</table>';
        return $output;
    }

}
