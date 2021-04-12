<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exotel_calls;
use App\User;

class ExotelCallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      $user = user::findOrFail(auth()->user()->id);
      $post_data = array(
          'From' => $user->primary_phone,
          'To' => $id,
          'CallerId' => "044-462-70777",
          'TimeLimit' => "<time-in-seconds> (optional)",
          'TimeOut' => "<time-in-seconds (optional)>",
          'CallType' => "trans" //Can be "trans" for transactional and "promo" for promotional content
      );

      // You can get your $exotel_sid, $api_key and $api_token from: https://my.exotel.com/apisettings/site#api-credentials
      $api_key = "f0a64182984d85052feb76c8630a66ef09dc4a9908160de9"; // Your `API KEY`.
      $api_token = "7d65d03bb8b3a2d73685b6cb99df8aa35c0bf1023c14b480"; // Your `API TOKEN`
      $exotel_sid = "doctordisplay"; // Your `Account Sid`

      $url = "https://".$api_key.":".$api_token."@twilix.exotel.in/v1/Accounts/".$exotel_sid."/Calls/connect";

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_VERBOSE, 1);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FAILONERROR, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

      $http_result = curl_exec($ch);
      $error = curl_error($ch);
      $http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
      curl_close($ch);

      $xml = simplexml_load_string($http_result);
      dd($xml);
      foreach ($xml->Call as $val)
      {
        $call_res  = $val->Sid.' ';
      }
      if(empty($call_res)){
        $call_res = '';
      }
      $exocalls = new exotel_calls;
      $exocalls->customer_phone = $id;
      $exocalls->call_result    = $call_res;
      if($exocalls->save()){
        return redirect()->back();
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
