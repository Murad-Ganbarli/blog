<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\HasApiTokens;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name('api.')->group(function () {

    // Explicit routing of API resource:

//    Route::get('/blogs',[\App\Http\Controllers\BlogApiController::class, 'index'])->name('blogs.index');
//    Route::get('/blogs/{id}',[\App\Http\Controllers\BlogApiController::class,'show'])->name('blogs.show');
//    Route::post('/blogs', [\App\Http\Controllers\BlogApiController::class, 'store'])->name('blogs.store');
//    Route::put('/blogs/{id}',[\App\Http\Controllers\BlogApiController::class,'update'])->name('blogs.update');
//    Route::delete('blogs/{id}',[\App\Http\Controllers\BlogApiController::class, 'destroy'])->name('blogs.destroy');

    // Implicit routing of API resource:
    Route::apiResource('blogs' , \App\Http\Controllers\BlogController::class);
    Route::apiResource('blogs-v2' , \App\Http\Controllers\BlogFullController::class);
    Route::apiResource('categories', \App\Http\Controllers\CategoryController::class);


});

