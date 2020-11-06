<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\BugChart;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //Bug chart
            $bug = DB::table('bugs')
                ->select('status', DB::raw('count(*) as total'))
                ->groupBy('status')
                ->pluck('total','status');

            $chart = new BugChart;
            $chart->labels($bug->keys());
            $chart->dataset('My dataset 1', 'pie', $bug->values())
                ->options([
                    'color' => '#c2ab0f',
                    'backgroundColor' => ['#42f56f','#c2ab0f','#007bff','#ff0040','#4e35b5'],
                ]);
        //Project Chart
            $projects = Project::all();
            foreach($projects as $project){
               dd($project->bugs->toArray());
            }



        return view('home',compact('chart'));
    }

    public function randColors(){
        $rgbColor = array();


        foreach(array('r', 'g', 'b') as $color){
            //Generate a random number between 0 and 255.
            $rgbColor[$color] = mt_rand(0, 255);
        }

        var_dump($rgbColor);
    }
}
