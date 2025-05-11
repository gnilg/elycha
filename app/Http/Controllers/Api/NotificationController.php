<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Notification as ResourcesNotification;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Services\FirebaseService;

class NotificationController extends Controller
{
    public function clients()
    {
        return response()->json(
            ResourcesNotification::collection(
                Notification::where('status', 1)->where('type', 1)->orderBy('created_at', 'DESC')->get()
            )
        );
    }

    public function agents()
    {
        return response()->json(
            ResourcesNotification::collection(
                Notification::where('status', 1)->where('type', 2)->orderBy('created_at', 'DESC')->get()
            )
        );
    }

     //New version
     public function storeToken(Request $request)
     {
         $request->validate([
             'device_token' => 'required|string',
         ]);
     
         $user = auth()->user();
         $user->device_token = $request->device_token;
         $user->save();
     
         return response()->json(['message' => 'Token stored']);
     }
     
     public function sendPush(User $user, $title, $body)
     {
         $SERVER_API_KEY = 'BNQ3p_5IzOgCVi5mFI_q9pGIM51qeohxufGfVZe5yX0YZstJ5tD-V-hvKLJtR95GUb1X06FJLOTvUDSPAdQLZik';
     
         $data = [
             "to" => $user->device_token,
             "notification" => [
                 "title" => $title,
                 "body" => $body,
             ],
             "priority" => "high"
         ];
     
         Http::withHeaders([
             "Authorization" => "key=$SERVER_API_KEY",
             "Content-Type" => "application/json"
         ])->post('https://fcm.googleapis.com/fcm/send', $data);
     }
     public function notify(FirebaseService $firebase)
     {
         $user = auth()->user(); // or auth()->user()
         $response = $firebase->sendToUser($user, 'Bienvenue', 'Toute l\'équipe Alkebulan vous souhaitent la bienvenue. Tél: (+228) 90 06 53 35.');
     
         return response()->json($response);
     }
     
     public function fetchNotifications()
     {
         return auth()->user()->notifications;
     }
     
}
