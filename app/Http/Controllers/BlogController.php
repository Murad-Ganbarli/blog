<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $blogs = Blog::all();

      return view('blog-index',['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        // BlogRequest classi yaratdim deye bunlari sildim

//      $validated = $request->validate([
//          'title' => ['required', 'alpha:ascii'],
//          'content' => ['required']
//      ]);
        $validated = $request->validated();
      // validate ile yazanda:
        $blog = Blog::create($validated);



      //  validate olunmamisdab evvel
//      $blog = Blog::create([
//          "title" => $request->input('title'),
//          "content" => $request->input('content')
//      ]);
      return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog-show', ['blog' => $blog]);
    }

    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog-edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // burani blogrequest elemedim
        $validated = $request->validate([
            'title' => ['required'],
            'content' => ['required']
        ]);
        $blog = Blog::findOrFail($id);

        $blog->Blog::update($validated);
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::destroy($id);
        return redirect()->route('blogs.index');
    }
}
