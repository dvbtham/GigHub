<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use Illuminate\Http\Request;
use Response;

class AttendancesController extends Controller
{
    public function attend(Request $request)
    {
        $userId = $request->userId;

        if ($userId === null) {
            return Response::json("Login is required", 400);
        }

        $exists = Attendence::where('gig_id', $request->gigId)
            ->where('attendee_id', $userId)->first() != null;

        if ($exists) {
            $attendanceToCancel = Attendence::where('gig_id', $request->gigId)
                ->where('attendee_id', $userId)->first();

            $isCancelled = Attendence::where('is_canceled', true)
                ->where('gig_id', $request->gigId)
                ->where('attendee_id', $userId)->first() !== null;

            if (!$isCancelled) {
                $attendanceToCancel->is_canceled = true;
                $attendanceToCancel->save();
                return Response::json("Cancelled", 200);
            } else { $attendanceToCancel->is_canceled = false;
                $attendanceToCancel->save();
                return Response::json("UnCancelled", 200);
            }
        }
        else {
            $attendance = new Attendence([
                'gig_id' => $request->gigId,
                'attendee_id' => $userId,
                'is_canceled' => false,
            ]);
            $attendance->save();
            return Response::json("NewAttendance", 200);
        }
    }
}
