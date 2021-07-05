<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\User;
use Hash;
use PDF;

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
        $user->password       = Hash::make('12345678');
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
        $user->blood_group      = $request->input('blood_group');
        $user->mother_tongue    = $request->input('mother_tongue');
        $user->languages_known  = $request->input('languages_known');
        $user->nationality      = $request->input('nationality');
        $user->religion         = $request->input('religion');
        $user->school           = $request->input('school');
        $user->course           = $request->input('course');
        $user->emergency_contact_name = $request->input('emergency_contact_name');
        $user->emergency_contact_relation = $request->input('emergency_contact_relation');
        $user->emergency_contact_phone  = $request->input('emergency_contact_phone');
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

        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper(array(0,0,225,345));
        $output = "
        <html>
          <head>
            <title>ID Card</title>
            <style>
              @page{ margin: 0; }

            </style>
          </head>
          <body style='background-image:url(img/idcard/id_card_front.png);
                       background-repeat: no-repeat;
                       background-size: 100% 100%;
                       font-family: 'Verdana';'>
            <div style='width: 130px;
                        height: 130px;
                        border-radius: 150%;
                        position: relative;
                        overflow: hidden;
                        margin-left:85px;
                        margin-top:82px;'>
              <img src='storage/".$user->profile_image."'
                                  style='border-radius:150%; width:130px; height:auto;'>
            </div>
            <center><h2>".$user->name."</h2><small>".$user->user_type."</small></center>
            <table style='margin-left:50px;'>
            <tr><td>Emp. ID: </td><td>EMP000".$user->id."</td></tr>
            <tr><td>Contact: </td><td>".$user->primary_phone."</td></tr>
            <tr><td>Father's Name: </td><td>".$user->fathers_name."</td></tr>
            <tr><td>DOB: </td><td>".date('d-m-Y', strtotime($user->date_of_birth))."</td></tr>
            <tr><td>Valid Upto: </td><td>30-12-2021</td></tr>
            </table>
          </body>
        </html>
        ";
        $pdf->loadHTML($output);
        return $pdf->stream();
        /*
        if($user->user_type=='Service Man'){
          $orders = orders::where('serviceman_id',$user->id)->get();
          return view('admin.accounts', compact('user','orders'));
        }else{
          return view('admin.accounts',compact('user'));
        }
        */
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
      if(!empty($request->input('user_type'))){
        $user->user_type      = $request->input('user_type');
      }
      if($request->hasFile('profile_picture')){
        $image  = explode('/',$request->file('profile_picture')->store('public'));
        $user->profile_image  = $image[1];
      }
      $user->blood_group      = $request->input('blood_group');
      $user->mother_tongue    = $request->input('mother_tongue');
      $user->languages_known  = $request->input('languages_known');
      $user->nationality      = $request->input('nationality');
      $user->religion         = $request->input('religion');
      $user->school           = $request->input('school');
      $user->course           = $request->input('course');
      $user->emergency_contact_name = $request->input('emergency_contact_name');
      $user->emergency_contact_relation = $request->input('emergency_contact_relation');
      $user->emergency_contact_phone  = $request->input('emergency_contact_phone');

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
