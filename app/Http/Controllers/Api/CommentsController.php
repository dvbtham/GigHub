<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentsController extends Controller
{
    protected $rules =
    [
        'email' => 'max:256',
        'name' => 'max:256',
        'comment' => 'required|min:10',
    ];

    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
            return Response::json(['errors' => $validator->getMessageBag()->toArray()], 400);
        }
        else {
            try {
                $comment = new Comment();

                $comment->email = $request->email;
                $comment->name = $request->name;

                $comment->created_at = Carbon::createFromFormat('d/m/Y H:i', $request->created_at);
                $comment->updated_at = Carbon::createFromFormat('d/m/Y H:i', $request->updated_at);
                $comment->comment = $request->comment;
                $comment->approved = true;
                $comment->gig_id = $request->gig_id;

                if(isset($request->reply_id))
                   $comment->reply_id = $request->reply_id;

                $comment->save();
                return response()->json($comment);
            }
            catch (\Illuminate\Database\QueryException $ex) {
                return response()->json(['errors' => $ex->getMessage()], 500);
            }

        }
    }
}
