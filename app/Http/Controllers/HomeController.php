<?php

namespace App\Http\Controllers;

use App\Charts\ProjectChart;
use App\Project;
use App\Bug;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\BugChart;
use Illuminate\Support\Facades\Auth;


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
        $chart->dataset('Bug Distribution', 'polarArea', $bug->values())
            ->options([
                'color' => '#c2ab0f',
                'backgroundColor' => ['#42f56f','#c2ab0f','#007bff','#ff0040','#4e35b5'],
            ]);
        //Project Chart
        //$projects = Project::all()->toArray();
        $projects = DB::table('projects')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total','status');

        $pj_chart = new ProjectChart();
        // return $projects->values();
        $pj_chart->labels($projects->keys());

        $pj_chart->dataset('Project Distribution','doughnut',$projects->values())
            ->options([
                'backgroundColor' =>['#c2ab0f','#0cdb93']
            ]);

        //To fetch projects for various users
        //for test engineer
        $pj_tester = DB::table('project_user')
            ->join('projects','projects.id','project_user.project_id')
            ->where('project_user.user_id',Auth::user()->id )
            ->get();
        //for developer
        $pj_dev = DB::table('bugs')
            ->join('projects','projects.id','bugs.project_id')
            ->where('bugs.assigned',Auth::user()->id)
            ->get();
        //To get Overdue bugs
//        $total = Project::where( 'created_at', '>=', Carbon::now()->firstOfYear())->get()->toArray();




        $overdue = Bug::whereDate('due_date','<=',Carbon::now())
            ->where('status','!=','Approved')
            ->get();
//        dd($overdue);
        return view('home',compact('chart','pj_chart','pj_tester','pj_dev','overdue'));
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
