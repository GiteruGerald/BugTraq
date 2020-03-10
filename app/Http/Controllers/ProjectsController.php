<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

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
        //
        if (Auth::check()) {
        //to pick projects by a certain user
            $projects = Project::where('user_id', Auth::user()->id)->get();
            //to view all projects
                //$projects = Project::all();
            return view('projects.index', ['projects' => $projects]);

        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Auth::check()) {
            $project = Project::create([
                'pj_name'=>$request->input('pj_name'),
                'pj_type'=>$request->input('pj_type'),
                'pj_description' =>$request->input('pj_description'),
                'pj_manager' => $request->input('pj_manager'),
                'user_id'=>Auth::user()->id
            ]);
            //if project was created successfully
            if ($project) {
                return redirect()->route('projects.show', ['project' => $project->id])
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
        $project = Project::where('id',$project->id)->first();

        return view('projects.show',['project'=>$project]);
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
        //if(Auth::guard('admin')){
            if($findProject ->delete()){
                return redirect()->route('admin.projects')
                    ->with('success','Project deleted successfully');
            }
            return back()->withInput()->with('errors','Project could not be deleted');
      //  }
    }
}
