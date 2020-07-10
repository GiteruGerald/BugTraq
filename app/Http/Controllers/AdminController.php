<?php

namespace App\Http\Controllers;

use App\Bug;
use App\Project;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    public function  showprojects(){
        if(Auth::guard('admin')){
           // $projects = Project::latest()->paginate(5);
            $projects = Project::latest()->paginate(4);
            return view('admin.projects',compact('projects'))
                ->with('i', (request()->input('page',1)-1)*4);
      }

    }

    public function showbugs(){
        if(Auth::guard('admin')){
            $bugs = Bug::all();
            return view('admin.bugs',['bugs'=> $bugs]);
        }
    }

    public function showusers(){
        if(Auth::guard('admin')){
            $users = User::all();
            return view ('admin.users',['users'=> $users]);
        }
    }

    public function destroyProject(Project $project){
        $findProject = Project::find( $project->id);
        if($findProject->bugs()->count()){
            return back()->with('success',".$project->pj_name.".' cannot be deleted, has bug records');
        }
        //if(Auth::guard('admin')){
        if($findProject ->delete()){
            return redirect()->route('admin.projects')
                ->with('success','Project deleted successfully');
        }
        return back()->withInput()->with('errors','Project could not be deleted');
        //
    }

    public function show_project_details($id){
        $project = Project::where('id',$id)->first();
        $testers = DB::table('users')->where('user_group','Test Engineer')->get();

        return view('admin.pj_details',compact('project','testers'));
    }
}
