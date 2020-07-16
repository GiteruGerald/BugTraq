<?php

namespace App\Http\Controllers;

use App\Bug;
use App\Project;
use App\User;
use App\Charts\BugChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BugsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $bug = Bug::orderBy('project_id')
                   // ->pluck('project_id','status');

        $bug = DB::table('bugs')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total','status');
        //return $bug->keys();

        //return $bug->values();
        $chart = new BugChart;
        $chart->labels($bug->keys());
        $chart->dataset('My dataset 1', 'pie', $bug->values());

        if (Auth::user()->user_group=='Developer'){
            $bugs = Bug::where('assigned',Auth::user()->name.' '.Auth::user()->lastname)->get();
        }
        elseif (Auth::user()->user_group=='Test Engineer'){
            $bugs = Bug::where('reporter', Auth::user()->name .' '.Auth::user()->lastname)->get();
        }
        else{
            $bugs = Bug::all();
        }

        return view('bugs.index', compact('bugs','chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id =null)//null is the default value assigned if id not entered
    {
        //
        $devs = User::where('user_group','Developer')->get();

        $projects = null;

        if(!$project_id){
            $projects = Project::where('user_id',Auth::user()->id)->get();
        }else{
            $projects = Project::where('id',$project_id)->first();
        }
        return view('bugs.create',['project_id'=>$project_id,'projects'=>$projects,'devs'=> $devs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()) {
            $bug = Bug::create([
                'project_id'=>$request->input('project_id'),
                'title'=>$request->input('title'),
                'reporter'=>Auth::user()->name.' '.Auth::user()->lastname,
                'type'=>$request->input('bug_type'),
                'description' =>$request->input('description'),
                'priority'=>$request->input('priority'),
                'assigned' => $request->input('assigned'),
                'due_date'=>$request->input('due_date')
            ]);
                //dd($bug);
            //if bug was created successfully
            if ($bug) {
                return redirect()->to('/projects/'.$request->input('project_id'))
                //return redirect()->route('bugs.show', ['bug' => $bug->id])
                    ->with('success', 'Bug created successfully');
            }
        }
        //if not created successfully
        return back()->withInput()->with('errors','Error creating new bug');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function show(Bug $bug)
    {
        //
        $bug = Bug::where('id',$bug->id)->first();
        $devs = User::where('user_group','Developer')->get();

        $comments = $bug->comments;

        return view('bugs.show',['bug'=>$bug,'comments'=>$comments,'devs'=>$devs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function edit(Bug $bug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bug $bug)
    {
        //
        $bugUpdate = Bug::where('id',$bug->id)
            ->update([
                'type'=>$request->input('bug_type'),
                'description'=>$request->input('description'),
                'priority'=>$request->input('priority'),
                'assigned'=>$request->input('dev'),
                'due_date'=>$request->input('due_date'),
                'status'=>$request->input('status')
            ]);
        if($bugUpdate){
            return redirect()->to('/bugs/'.$bug->id)
            ->with('success','Bug Status changed successfully');


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bug $bug)
    {
        //
        $findBug = Bug::find($bug->id);
        //TODO: check if comments are also deleted ($findBug->comments()
        $comments = $findBug->comments();

        if($findBug ->delete()){
            $comments->delete();
            return redirect()->route('bugs.index')
                ->with('success',".$findBug->title.".' (bug) deleted successfully');
        }
        return back()->withInput()->with('errors','Bug could not be deleted');
    }
}
