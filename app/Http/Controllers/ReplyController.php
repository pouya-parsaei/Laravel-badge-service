<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Topic $topic)
    {
        $topic->replies()->create([
           'user_id'=> auth()->user()->id,
           'text' => request()->text
        ]);

        return back()->withSuccess(__('messages.replies.created'));
    }
}
