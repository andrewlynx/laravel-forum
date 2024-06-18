<?php

namespace App\Http\Controllers;

use App\Filters\ThreadFilters;
use App\Models\Category;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Category $category = null, ThreadFilters $filters)
    {
        $threads = $this->getThreads($category, $filters);

        if (request()->wantsJson()) {
            return $threads;
        }

        return view('threads.index', ['threads' => $threads]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $thread = Thread::create([
            'user_id'     => auth()->id(),
            'category_id' => request('category_id'),
            'title'       => request('title'),
            'body'        => request('body'),
        ]);

        return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     */
    public function show($categoryId, Thread $thread)
    {
        return view('threads.show', ['thread' => $thread, 'replies' => $thread->replies()->paginate(5)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thread $thread)
    {
        //
    }

    /**
     * @param Category|null $category
     * @param ThreadFilters $filters
     * @return mixed
     */
    public function getThreads(?Category $category, ThreadFilters $filters)
    {
        if ($category and $category->exists) {
            $threads = $category->threads()->getQuery();
        } else {
            $threads = Thread::query();
        }

        return $threads->filter($filters)->get();
    }
}
