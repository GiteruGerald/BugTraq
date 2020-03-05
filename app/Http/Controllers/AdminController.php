<?php

namespace App\Http\Controllers;

use App\Bug;
use App\Project;
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
            $projects = Project::all();
            return view('admin.projects',['projects'=> $projects]);
      }

    }

    public function showbugs(){
        if(Auth::guard('admin')){
            $bugs = Bug::all();
            return view('admin.bugs',['bugs'=> $bugs]);
        }
    }
}
