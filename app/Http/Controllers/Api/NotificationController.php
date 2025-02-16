<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Notification as ResourcesNotification;
use App\Models\Notification;
use Illuminate\Http\Request;

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
}
