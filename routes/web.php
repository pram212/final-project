<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/post', PostController::class);
Route::resource('/user', UserController::class);
Route::resource('/profile', ProfileController::class);
Route::post('/comment/add', [App\Http\Controllers\CommentController::class, 'store']);
Route::get('/like/{post_id}', [App\Http\Controllers\LikeController::class, 'store']);
Route::get('/userlist', function () {
    $user = App\Models\User::all();
    return response($user);
});

Route::post('/profile/foto/{id}', [App\Http\Controllers\UploadProfileController::class, 'store']);
