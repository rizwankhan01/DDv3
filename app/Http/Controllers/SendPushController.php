<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Notification;
use App\Notifications\SendPushNotification;
use Kutia\Larafirebase\Facades\Larafirebase;

class SendPushController extends Controller
{
  public function updateToken(Request $request){
    try{
        $request->user()->update(['fcm_token'=>$request->token]);
        return response()->json([
            'success'=>true
        ]);
    }catch(\Exception $e){
        report($e);
        return response()->json([
            'success'=>false
        ],500);
    }
  }

    public function notification(Request $request){

      $title = $request->input('title');
      $message = $request->input('message');
      $fcmTokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

      $SERVER_API_KEY = 'AAAAtUdBMyQ:APA91bFOqBh8BffVbwSGwBHhXphnVm7KlSn1-BwNYbjfNAV7_4a5jZSvSHe9rjTq_hDy54nCxrAh20fKq3m2ftlBX0FUKWz8OKNR1FkVX1VW4rXIY2zbkxFIrWb8za86ehYu4zcjmhtd';

        $data = [
            "registration_ids" => $fcmTokens,
            "notification" => [
                "title" => $title,
                "body" => $message,
                "priority" => 'high',
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
    }
}
