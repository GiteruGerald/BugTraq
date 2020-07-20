<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Tests\React_WritableStreamInterface;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $user = User::where('id',$user->id)->first();
        //dd($user);
        return view('users.show',['users'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $user = User::find($user->id);

      //  return view('users.edit',['user'=>$user]);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $userUpdate = User::where('id',$user->id)
            ->update([
                'name'=> $request->input('name'),
                'lastname'=>$request->input('lastname'),
                'email'=>$request->input('email'),
                'phone_no'=>$request->input('phone'),

            ]);


       //if user was edited successfully
       if($userUpdate){
           return redirect()->route('users.show',['user'=>$user->id])
               ->with('success','User Details updated successfully');
       }
       //redirect
        return back()->withInput();
    }

    public function avatarUpload(Request $request)
    {
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        if($request->hasFile('image')) {

            $avatar = $request->file('image');
            $input['imagename'] = time() . '.' . $avatar->getClientOriginalExtension();
            //dd($input['imagename']);
            $destinationPath = public_path('uploads/avatars');
            $avatar->move($destinationPath, $input['imagename']);

            $imgUpdate = User::where('id', Auth::user()->id)
                ->update([
                    'avatar' => $input['imagename']
                ]);

            if ($imgUpdate) {
                return redirect()->route('users.show', ['user' => Auth::user()->id])
                    ->with('success', 'Image profile added successfully');
            }
        }elseif($request->file('image') == null){
            return back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

    }
}
