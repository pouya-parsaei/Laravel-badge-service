<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    public function create()
    {
        return view('badges.create');
    }

    public function store(Request $request)
    {
        Badge::create($request->all());

        return back()->withSuccess(__('messages.badges.created'));
    }
}
