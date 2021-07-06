<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use PDF;

class IDCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->back();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $userid = explode('.',$id);
      $user = user::findOrFail($userid[1]);
      if($userid[0]=='front'){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper(array(0,0,225,345));
        $output = "
        <html>
          <head>
            <title>ID Card - Front</title>
            <style>
              @page{
                margin: 0;
              }
              @font-face {
                  font-family: 'helvetica';
                  src: local('helvetica'), url('fonts\Helvetica.ttf') format('truetype');
                  font-weight: normal;
                  font-style: normal;
              }
            </style>
          </head>
          <body style='background-image:url(img/idcard/id_card.jpg);
                       background-repeat: no-repeat;
                       background-size: 100% 100%;
                       font-family: Helvetica;'>
            <center>
              <div style='margin-left:75px;margin-top:100px;position: relative; overflow: hidden; width: 150px; height: 150px; border: 3px solid #F6B803; border-radius: 75px;'>
                <img src='storage/".$user->profile_image."' style='position: absolute; width: 200px; left: -30px;top: -10px;'>
              </div>
              <p><b>".$user->name."</b></p><small>".$user->user_type."</small>
              </center>
              <center>
            <table style='font-size:14px;padding:25px;margin-top:-20px;margin-left:50px;'>
            <tr><td style='color:#123A5B;'>Emp. ID: </td><td>EMP000".$user->id."</td></tr>
            <tr><td style='color:#123A5B;'>DOB: </td><td>".date('d-m-Y', strtotime($user->date_of_birth))."</td></tr>
            <tr><td style='color:#123A5B;'>Valid Upto: </td><td>30-12-2021</td></tr>
            </table>
            </center>
          </body>
        </html>
        ";
        $pdf->loadHTML($output);
        return $pdf->stream();
      }else{
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper(array(0,0,225,345));
        $output = "
        <html>
          <head>
            <title>ID Card - Back</title>
            <style>
              @page{
                margin: 0;
              }
              @font-face {
                  font-family: 'helvetica';
                  src: local('helvetica'), url('fonts\Helvetica.ttf') format('truetype');
                  font-weight: normal;
                  font-style: normal;
              }
            </style>
          </head>
          <body style='background-image:url(img/idcard/id_card.jpg);
                       background-repeat: no-repeat;
                       background-size: 100% 100%;
                       font-family: Helvetica;'>
            <center>
            <table style='font-size:14px;padding:25px;margin-top:90px;'>
            <tr><td style='color:#123A5B;'>Phone: </td><td>".$user->primary_phone.", 04446270777</td></tr>
            <tr><td style='color:#123A5B;'>Blood Group: </td><td>".$user->blood_group."</td></tr>
            <tr><td style='color:#123A5B;'>Father's Name: </td><td>".$user->fathers_name."</td></tr>
            <tr><td style='color:#123A5B;'>DOB: </td><td>".date('d-m-Y', strtotime($user->date_of_birth))."</td></tr>
            <tr><td style='color:#123A5B;'>Address: </td><td>".$user->address.", ".$user->city."</td></tr>
            <tr><td style='color:#123A5B;'>Office: </td><td>Modern Tower, No.23, F6 ,First floor, Westcott Rd, Royapettah, Chennai, Tamil Nadu 600014</td></tr>
            <tr><td style='color:#123A5B;'>Email: </td><td>".$user->email.", order@doctordisplay.in</td></tr>
            </table>
            </center>
          </body>
        </html>
        ";
        $pdf->loadHTML($output);
        return $pdf->stream();
      }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
