<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories =Category::all();
        if($request->expectsJson()){
            return $categories;
        }
        return view('blog-index', ['categories'=>$categories]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validated();
        $category = Category::create($validated);
        if($request->expectsJson()) {
            return $category;
        }
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request , string $id)
    {
        $category = Category::findOrFail($id);
        if($request->expectsJson()){
            return $category;
        }
        return view('category-show', ['category'=>$category]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category-edit', ['category'=>'$category']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrfail($id);
        $validated = $request->validated();
        $category->update($validated);
        if($request->expectsJson()) {
            return $category;
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request ,string $id)
    {
        Category::destroy($id);
        if ($request->expectsJson()){
            return response()->status(204);
        }
        return redirect()->route('categories.index');
    }
}
