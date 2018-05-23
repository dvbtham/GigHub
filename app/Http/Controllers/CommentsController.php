<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;

class CommentsController extends Controller
{
    public function store(CommentStoreRequest $request)
    {
        return redirect()->back();
    }
}
