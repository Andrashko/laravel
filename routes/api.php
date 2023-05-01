<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use  App\Models\Post;
use  App\Http\Resources\PostResource;
use  App\Http\Resources\PostCollection;
use App\Http\Controllers\SanctumController;

Route::get('/posts', function () {
    return new PostCollection(Post::paginate(2));
})->middleware('auth:api');

Route::middleware('auth:api')->group(function () {
    Route::get('/posts/{id}', function (string $id) {
        return new PostResource(Post::findOrFail($id));
    });

    Route::post('posts',  function () {return ["status"=>"ok"];});
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/tokens/create', [SanctumController::class, 'create']);
Route::post('/tokens/login',  [SanctumController::class, 'login']);