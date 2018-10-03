<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::all();
	   return view('user.show', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->work = $request->work;
		$user->password = bcrypt($request->password);
        $user->save();
		
		 return redirect()->route('stockman');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    { 
		//$user = $user->find($request->user->id);
		$user = $user->find($user->id);
		return view('user.edit_user', ['user' => $user]);
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
		$user = $user->find($request->user->id);
        //$flight = App\Flight::find(1);
		//$user = new User;
        $user->name = $request->name;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->work = $request->work;
		if($request->password != ""){
			$user->password = bcrypt($request->password);
		}
		
        $user->save();
		return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
		 $user = $user->find($request->user->id);//
         $user->delete();
		 return redirect()->route('user.index');
    }
}
