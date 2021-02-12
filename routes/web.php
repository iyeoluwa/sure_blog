<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

Route::get('/',[\App\Http\Controllers\DashboardController::class,'home'])->name('home');


//this set of routes are for the login and register pages

Route::get('/login',[\App\Http\Controllers\Auth\Login::class,'index'])->name('login');
Route::post('/login',[\App\Http\Controllers\Auth\Login::class,'login']);

Route::post('/logout',[\App\Http\Controllers\Auth\LogoutController::class, 'store'])->name('logout');

Route::get('/register',[\App\Http\Controllers\Auth\Register::class,'index'])->name('register');
Route::post('/register',[\App\Http\Controllers\Auth\Register::class,'store']);

//this set of routes will take the writer to his own page where he can post more articles
Route::get('/myposts/{user:name}/articles',[\App\Http\Controllers\PostController::class,'index'])->name('myposts');

Route::get('/myposts/edit/articles/{id}',[\App\Http\Controllers\PostController::class,'show'])->name('posts.edit');
Route::post('/myposts/edit/articles/{id}',[\App\Http\Controllers\PostController::class,'edit']);
Route::delete('/myposts/edit/articles/{post}',[\App\Http\Controllers\PostController::class,'destroy']);

Route::get('/myposts/addpost',[\App\Http\Controllers\PostController::class,'showForm'])->name('addpost');

Route::post('/myposts/addpost',[\App\Http\Controllers\AddPostController::class,'upload']);

Route::get('/article/{post}',[\App\Http\Controllers\UserPostController::class,'index'])->name('article.show');


//this is for the profile pages


Route::get('/profile/addprofile/{user:id}',[\App\Http\Controllers\ProfileController::class,'index'])->name('profile.add');
Route::post('/profile/addprofile/{user:id}',[\App\Http\Controllers\ProfileController::class,'store']);
Route::get('/profile/author/{user}',[\App\Http\Controllers\ProfileController::class,'show'])->name('profile.show');



//this is for the permission pages

Route::get('/roles',[\App\Http\Controllers\PermissionController::class,'Permission']);

//this is for the commenting functions
Route::post('/comment/store',[\App\Http\Controllers\CommentController::class,'store'])->name('comment.add');
Route::post('/reply/store',[\App\Http\Controllers\CommentController::class,'replystore'])->name('reply.add');
//this is for the recommendation pages
//Route::get('/article/{post}',[\App\Http\Controllers\RecommendationController::class,'author']);





