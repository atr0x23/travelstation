<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeHateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PostController::class,'index'])->name('posts.list');
Route::get('/list', [PostController::class,'index'])->name('posts.list');
/** filter the movies by user name */
Route::get('/byuser/{id}', [PostController::class,'filter_by_user'])->name('post.filter_by_user');
/** Sort the movies by date added. */
Route::get('/bydate', [PostController::class,'sort_by_date'])->name('list');
/** sort the movies by likes */
//Route::get('/bylikes', [LikeHateController::class,'sort_by_likes'])->name('posts.bylike');

/* routes for registered users */
Route::middleware('auth')->group(function(){

    Route::get('/create', [PostController::class,'create'])->name('posts.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/list/byuser/{id}', [PostController::class, 'filter_by_user'])->name('posts.list');
    // route for like or dislike
    Route::post('save-likedislike', [PostController::class, 'save_likedislike'])->name('like.dislike');
    //Route::post('post/like/{id}', [PostController::class, 'save_likedislike'])->name('like.dislike');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
