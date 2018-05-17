<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Notification;

class NotificationsController extends Controller
{
    public function getNewNotifications()
    {
        if(!Auth::check()) return response()->json(['notifications' => array()], 200);

        $userid = Auth::user()->id;
        $notifications = Notification::where('user_id','=', $userid)->orWhere('is_read', false);
        return response()->json(['notifications' => $notifications], 200);
    }
}
