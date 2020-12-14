<?php

namespace App\Http\Controllers;

use PDF;
use App\Bug;
use App\Project;
use App\User;
use App\Charts\ProjectChart;
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

        $chart->dataset('Bug Distribution', 'pie', $bug->values())
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

        //Project Chart
            //$projects = Project::all()->toArray();
            $project = DB::table('projects')
                ->select('status', DB::raw('count(*) as total'))
                ->groupBy('status')
                ->pluck('total','status');

            $pj_chart = new ProjectChart();
           // return $projects->values();
            $pj_chart->labels($project->keys());

            $pj_chart->dataset('Project Distribution','doughnut',$project->values())
                ->options([
                    'backgroundColor' =>['#c2ab0f','#0cdb93']
                ]);

        return view('reports.projects', ['projects'=>$projects,'chart'=>$pj_chart]);
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
        $bugs = DB::table('bugs')
            ->join('users','users.id','bugs.assigned')
            ->where('bugs.id',$id)
            ->first();
//        dd($bug);
        $pdf = PDF::loadView('reports/pdf',compact('bug','bugs'));


       return $pdf->stream();
    }

    public function project_export(Request $request){
        $projects = Project::all();
//        $projects = $request->input('pj_data');

        $pdf = PDF::loadView('reports/temp',compact('projects'));


        return $pdf->stream('projects.pdf');
    }

}
