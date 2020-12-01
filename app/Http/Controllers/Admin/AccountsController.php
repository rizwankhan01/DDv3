<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = user::all();
        return view('admin.accounts', compact('users'));
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
        $user = new user;
        $user->name           = $request->input('name');
        $user->email          = $request->input('email');
        $user->password       = Hash::make('123456');
        $user->gender         = $request->input('gender');
        $user->primary_phone  = $request->input('primary_phone');
        $user->secondary_phone= $request->input('secondary_phone');
        $user->address        = $request->input('address');
        $user->city           = $request->input('city');
        $user->fathers_name   = $request->input('father_name');
        $user->date_of_birth  = $request->input('dob');
        $user->date_of_join   = $request->input('doj');
        $user->user_type      = $request->input('user_type');
        $image                = explode('/',$request->file('profile_picture')->store('public'));
        $user->profile_image  = $image[1];
        $user->save();
        return redirect('/accounts')->with('status','New User Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::findOrFail($id);
        return view('admin.accounts', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user     = user::findOrFail($id);
      $user->name           = $request->input('name');
      $user->email          = $request->input('email');
      if(!empty($request->input('password'))){
        $user->password       = Hash::make($request->input('password'));
      }
      $user->gender         = $request->input('gender');
      $user->primary_phone  = $request->input('primary_phone');
      $user->secondary_phone= $request->input('secondary_phone');
      $user->address        = $request->input('address');
      $user->city           = $request->input('city');
      $user->fathers_name   = $request->input('father_name');
      $user->date_of_birth  = $request->input('dob');
      $user->date_of_join   = $request->input('doj');
      $user->user_type      = $request->input('user_type');
      if($request->hasFile('profile_picture')){
        $image  = explode('/',$request->file('profile_picture')->store('public'));
        $user->profile_image  = $image[1];
      }
      $user->update();
      return redirect()->back()->with('status','User Accounts Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = user::findOrFail($id);
      $user->delete();
      return redirect('/accounts')->with('status','User Deleted Successfully!');
    }
}
