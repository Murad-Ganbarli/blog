<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

// Explicit routing of API resource:

//Route::get('/blogs',[\App\Http\Controllers\BlogController::class, 'index'])->name('blogs.index');
//Route::get('/blogs/create',[\App\Http\Controllers\BlogController::class,'create'])->name('blogs.create');
//Route::get('/blogs/{id}',[\App\Http\Controllers\BlogController::class,'show'])->name('blogs.show');
//Route::post('/blogs', [\App\Http\Controllers\BlogController::class, 'store'])->name('blogs.store');
//Route::delete('blogs/{id}',[\App\Http\Controllers\BlogController::class, 'destroy'])->name('blogs.destroy');
//Route::get('/blogs/{id}/edit',[\App\Http\Controllers\BlogController::class, 'edit'])->name('blogs.edit');
//Route::put('/blogs/{id}',[\App\Http\Controllers\BlogController::class,'update'])->name('blogs.update');


// Implicit routing of API resource:
Route::resource('blogs' , BlogController::class);
Route::resource('blogs-v2', \App\Http\Controllers\BlogFullController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
