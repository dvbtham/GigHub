<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Following;
use Illuminate\Http\Request;

class FollowingsController extends Controller
{
    public function follow(Request $request)
    {
        $userId = $request->userId;
        $followeeId = $request->followeeId;

        $exists = Following::where('followee_id', $followeeId)
            ->where('follower_id', $userId)->first() !== null;

        if ($exists) {
            $followeeToCancel = Following::where('followee_id', $followeeId)
                ->where('follower_id', $userId)->first();

            $isCancelled = Following::where('followee_id', $followeeId)
                ->where('is_canceled', true)
                ->where('follower_id', $userId)->first() !== null;

            // return response()->json($isCancelled);

            if (!$isCancelled) {
                $followeeToCancel->is_canceled = true;
                $followeeToCancel->save();
                return response()->json('Cancelled');
            }

            $followeeToCancel->is_canceled = false;
            $followeeToCancel->save();
            return response()->json('UnCancelled');
        }

        $followee = new Following();
        $followee->followee_id = $followeeId;
        $followee->follower_id = $userId;
        $followee->is_canceled = false;

        $followee->save();

        return response()->json($followee);
    }
}
