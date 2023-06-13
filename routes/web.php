<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TailwindPostsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\AboutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/andrashko/cv', [AboutController::class, 'index'])->name('about');
Route::resource('/posts', PostsController::class);
//Route::resource('/comments', CommentsController::class)
//    ->middleware('auth')->except(['index']);
//Route::resource('/comments', CommentsController::class)
//    ->only(['index']);
Route::post('/comments', [CommentsController::class, 'store'])
    ->name('comments.store');
Route::delete('/comments/{id}', [CommentsController::class, 'destroy'])
    ->middleware('auth')->name("comments.destroy");
Route::resource('/tailwind/posts', TailwindPostsController::class)
    ->middleware('auth')->except(['index','show']);
Route::resource('/tailwind/posts', TailwindPostsController::class)
    ->only(['index','show']);

Route::get('token/update', [ApiTokenController::class, 'update'])
    ->middleware('auth')->name('update_token');

require __DIR__ . '/auth.php';

