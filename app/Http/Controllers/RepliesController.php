<?php

namespace App\Http\Controllers;

use App\Models\Thread;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($categoryId, Thread $thread)
    {
        $this->validate(request(), ['body' => 'required']);

        $thread->addReply([
            'body' => \request('body'),
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}
