<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Recruitment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment, Recruitment $recruitment)
    {
        //dd($recruitment);
        $comment->user_id = Auth::id();
        $comment->comment = $request['comment'];
        $comment->recruitment_id = $recruitment->id;
        $comment->save();
        return redirect('/recruitments/' . $recruitment->id);
    }
}
