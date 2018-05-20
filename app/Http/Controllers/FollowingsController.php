<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follwing;
use Auth;

class FollowingsController extends Controller
{
    public function following()
    {
        $following = Following::with('followee.follower')->where('followee_id', Auth::user()->id);
        return view('following.index', compact(['following']));
    }
}
