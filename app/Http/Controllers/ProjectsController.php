<?php

namespace App\Http\Controllers;

use App\Bug;
use App\Project;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ProjectsController extends Controller
{
    /**w
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pjID =DB::table('projects')->pluck('id');
        if (Auth::user()->user_group=='Manager') {
            //to pick projects by a certain user
//            $projects = Project::where('owner', Auth::user()->name.' '.Auth::user()->lastname)->get();
            $projects = Project::where('user_id', Auth::user()->id)->get();

            $bugcount = Bug::where('project_id',$pjID)->count();
            //to view all projects
            //$projects = Project::all();
            return view('projects.index', ['projects' => $projects,'bugCount'=> $bugcount]);

        }elseif(Auth::user()->user_group=='Test Engineer'){
            $bugcount = Bug::where('project_id',$pjID)->count();

            $projects = DB::table('project_user')
                ->join('projects','projects.id','project_user.project_id')
                ->where('project_user.user_id',Auth::user()->id )
                ->get();

            return view('projects.index', ['projects' => $projects,'bugCount'=> $bugcount]);

        }elseif (Auth::user()->user_group == 'Developer'){
            $bugcount = Bug::where('project_id',$pjID)->count();

            $projects = DB::table('bugs')
                ->join('projects','projects.id','bugs.project_id')
                ->where('bugs.assigned',Auth::user()->name.' '.Auth::user()->lastname)
                ->get();

            $projects = $projects->unique('pj_name');
            $projects = array_slice($projects->values()->all(), 0, 5, true);

            return view('projects.index',['projects'=>$projects,'bugCount'=> $bugcount]);
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Table::select('name','surname')->where('id', 1)->get();
        $users = DB::table('users')->where('user_group', 'Manager')->get();
        /*Model::where('id', 1)
             ->pluck('name', 'surname')
             ->all();*/
        /*$users = User::where('user_group','Manager')
             ->pluck('name','lastname')
              ->all();*/


        //return($users->name);
        return view('projects.create',['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$users = DB::table('users')->where('user_group', 'Manager')->get();

        $testers = DB::table('users')->where('user_group','Test Engineer')->get();
        if(Auth::check()) {
            $project = Project::create([
                'pj_name'=>$request->input('pj_name'),
                'pj_type'=>$request->input('pj_type'),
                'pj_description' =>$request->input('pj_description'),
                'owner' => $request->input('owner'),
                'user_id'=>Auth::user()->id
            ]);
            //if project was created successfully
            if ($project) {
                return redirect()->route('projects.show', ['project' => $project->id,'testers'=> $testers ])
                    ->with('success', 'Project created successfully');
            }
        }
        //if not created successfully
        return back()->withInput()->with('errors','Error creating new project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        $testers = DB::table('users')->where('user_group','Test Engineer')->get();
        $project = Project::where('id',$project->id)->first();

        return view('projects.show',['project'=>$project ,'testers'=> $testers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $project = Project::find($project->id);
        $users = DB::table('users')->where('user_group', 'Manager')->get();

        return view('projects.edit',['project' => $project,'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $testers = DB::table('users')->where('user_group','Test Engineer')->get();

        //TODO - add sweet alerts
        $projectUpdate = Project::where('id',$project->id)
            ->update([
                'pj_name'=> $request->input('title'),
                'status'=> $request->input('status'),
                'pj_description' => $request-> input('pj_description')

            ]);
        //if project was edited successfully
        if($projectUpdate){
            return redirect()->route('projects.index')
                ->with('success','Project updated successfully');
        }
        //redirect
        return back()->withInput();

    }

    public function search_projects(Request $request)
    {
        if (Auth::user()->user_group=='Manager') {

            $projects = Project::where('pj_name', 'like', '%' . $request->get('Query').'%')
                ->where('user_id', Auth::user()->id)
                ->get();
            //TODO:Check this loop
            foreach ($projects as $project) {
                $cnt = $project->bugs()->count();
                return json_encode(array($projects, $cnt));

            }

        }elseif(Auth::user()->user_group=='Test Engineer'){
            $projects = DB::table('project_user')
                ->join('projects','projects.id','project_user.project_id')
                ->where('pj_name','like','%'. $request->get('Query').'%')
                ->where('project_user.user_id',Auth::user()->id )
                ->get();

            return json_encode($projects);
        }elseif (Auth::user()->user_group == 'Developer'){
            $projects = DB::table('bugs')
                ->join('projects','projects.id','bugs.project_id')
                ->where('pj_name','like','%'. $request->get('Query').'%')
                ->where('bugs.assigned',Auth::user()->name.' '.Auth::user()->lastname)
                ->get();

            return json_encode($projects);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //

        $findProject = Project::find( $project->id);

        if($findProject->bugs()->count()){
            return back()->with('errors',"$project->pj_name.".'project cannot be deleted, has bug records');
        }

        if($findProject ->delete()){
            return
                redirect()->route('projects.index')
                    // back()
                    ->with('success',"$findProject->pj_name.".' project deleted successfully');
        }
        return back()->withInput()->with('errors','Project could not be deleted');

    }

    public  function addtester(Request $request){
        //adds tester by manager to project
        //take a project, add a tester to it
        $testers = DB::table('users')->where('user_group','Test Engineer')->get();

        $project =Project::find($request->input('project_id'));

        if(Auth::user()->id == $project->user_id){

            $tester = User::where('email',$request->input('email'))->first();
            //Checks if user is already added to the project
            $projectUser = ProjectUser::where('user_id',$tester->id)
                ->where('project_id',$project->id)
                ->first();
            if($projectUser){
                //if user already exists
                return redirect()->route('projects.show',['project'=>$project->id,'testers'=> $testers])
                    ->with('errors',$request->input('email').' is already a member of this project');
            }

            if($tester && $project){
                $project->users()->attach($tester->id);// can use toggle instead of attach, to remove user if alrady in DB
                return redirect()->route('projects.show',['project'=>$project->id,'testers'=> $testers])
                    ->with('success',$request->input('email').' was added to the project successfully');
            }

        }
        return redirect()->route('projects.show',['project'=>$project->id,'testers'=> $testers])
            ->with('errors','Error adding user to project');
    }
}
