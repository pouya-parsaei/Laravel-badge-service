<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::all();

        return view('topics.index',compact('topics'));
    }

    public function create()
    {
        return view('topics.create');
    }

    public function store()
    {
        $topic = auth()->user()->topics()->create(request()->all());

        return redirect()->route('topics.show',$topic)->withSuccess(__('messages.topics.created'));
    }

    public function show(Topic $topic)
    {
        return view('topics.show',compact('topic'));
    }


}
