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

    public function notification(){
      try{
          $fcmTokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

          //Notification::send(null,new SendPushNotification($request->title,$request->message,$fcmTokens));

          /* or */

          //auth()->user()->notify(new SendPushNotification($title,$message,$fcmTokens));

          /* or */

          Larafirebase::withTitle("Test")
              ->withBody("Hello World!")
              ->sendMessage($fcmTokens);

          dd('success','Notification Sent Successfully!!');

      }catch(\Exception $e){
          report($e);
          dd('error','Something goes wrong while sending notification.');
      }


      //Notification::send(null,new SendPushNotification("Testing","Hello world", $fcmTokens));
    }
}
