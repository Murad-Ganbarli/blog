<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogFullController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blogs =Blog::all();
        if($request->expectsJson()){
            return $blogs;
        }
       return view('blog-index', ['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // view qaytarir deyme
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $validated = $request->validated();
        $blog = Blog::create($validated);
        if($request->expectsJson()) {
            return $blog;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogRequest $request ,$id)
    {
        $blog = Blog::findOrFail($id);
        if ($request->expectsJson()){
            return $blog;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrfail($id);
        $validated = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);
        $blog->update($validated);
        if($request->expectsJson()) {
            return $blog;
        }
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        Blog::destroy($id);
        if ($request->expectsJson()){
            return response()->status(204);
        }
        return redirect()->route('blogs.index');
    }
}
