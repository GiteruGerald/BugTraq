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
            $users = User::latest()->paginate(4);
            return view ('admin.users',['users'=> $users])
                ->with('i', (request()->input('page',1)-1)*4);

        }
    }
    public function edit_user($id){
        $user = User::where('id',$id)->first();
        return view('admin.edit_user',compact('user'));
    }

    public function register_user(Request $request)
    {


        $data = $this->validate($request, [
            'name' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'emp_id' => 'required|string|max:6|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'dept' => 'required|string',
            'user_group' => 'required|string',
            'phone_no' => 'required|string|max:13|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        //dd($data);
        if($data = false){
            return back()->withInput()->with('errors',"New User could not be registered");
        }
        else {
            User::create([
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'emp_id' => $data['emp_id'],
                'email' => $data['email'],
                'dept' => $data['dept'],
                'user_group' => $data['user_group'],
                'phone_no' => $data['phone_no'],
                'password' => bcrypt($data['password']),
            ]);

            $users = User::latest()->paginate(5);
            return view('admin.users', ['users' => $users])
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    public function destroyProject($id){

        $projects = Project::latest()->paginate(4);

        $project = Project::where('id',$id)->first();
        if($project->bugs()->count()){
            return back()->with('success',".$project->pj_name.".' cannot be deleted, has bug records');
        }
        //if(Auth::guard('admin')){
        if($project ->delete()){
            return view('admin.projects', compact('projects','project'))
                ->with('success','Project deleted successfully')
                ->with('i', (request()->input('page',1)-1)*4);
        }
        return back()->withInput()->with('errors','Project could not be deleted');
        //
    }

    public function update_user(Request $request,User $user){
        $id = $request->input('id');
        $user = User::where('id',$id)->first();

        $userUpdate = User::where('id',$id)
            ->update([
                    'name'=> $request->input('fname'),
                    'lastname'=>$request->input('lname'),
                    'email' => $request->input('email'),
                    'phone_no' => $request->input('phone')

                    ]);
        if($userUpdate){
            return redirect()->route('admin.edit_user',['user'=>$user]);
        }
            return back()->withInput();
    }

    public function show_project_details($id){
        $project = Project::where('id',$id)->first();
        $testers = DB::table('users')->where('user_group','Test Engineer')->get();

        return view('admin.pj_details',compact('project','testers'));
    }

    public function show_bug_details($id)
    {
        $bug = Bug::where('id',$id)->first();
        $devs = User::where('user_group','Developer')->get();

        return view('admin.bg_details',compact('bug','devs'));
    }

    public function show_user_details($id)
    {
        $user = User::where('id',$id)->first();

        return view ('admin.user_details',compact('user'));
    }

    public function edit_bug(Request $request,$id)
    {

        $bugUpdate = Bug::where('id',$id)->first()
        ->update([
            'type'=>$request->input('bug_type'),
            'description'=>$request->input('description'),
            'priority'=>$request->input('priority'),
            'assigned'=>$request->input('dev'),
            'due_date'=>$request->input('due_date'),
            'status'=>$request->input('status')
        ]);
        if($bugUpdate){
            return back()->with('success',"Status successfully changed");
        }

    }
    public function userDelete($id)
    {
        $users = User::all();

        $user = User::where('id',$id)->first();

         if($user -> delete()){
             return redirect()->route('admin.users',compact('user','users'))
                 ->with('success','User deleted');
         }
         return back()->with('errors','User could not be deleted');
    }

    public function bugDelete($id)
    {
        //dd($id);
        $bugs = Bug::all();
        $bug = Bug::where('id',$id);
        $comments = $bug->comments();


        if($bug ->delete()){
            $comments->delete();
            return view('admin.bugs',compact('bug','bugs'))
                ->with('success','Bug deleted');
        }
        return back()->with('errors','Bug could not be deleted');
    }

}
