<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

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

    public function pdf_export($id){
        $bug = Bug::find($id);
        $projects = Project::all();

        //To get the chart


        $pdf = PDF::loadView('reports.pdf',compact('bug'))->setPaper('a4', 'landscape');
        $filename = $bug->title;

        return $pdf->stream($filename.'.pdf');


    }
}
