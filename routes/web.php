<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FilmSerieController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Mail\ReceptionCommentaire;

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


Route::get('/', Controller::class)->name('home');

// User routes
Route::resource('users', UserController::class)->only(["store", "update", "destroy"]);
Route::view('/register', 'register')->name("register")->middleware('notAuth');
Route::view('/login', "login")->name("login")->middleware('notAuth');
Route::view('/profile', "profile")->middleware("auth");
Route::view("/notifications", "notifications")->middleware("auth");
Route::post("/notifications", [NotificationController::class, "processNotification"]);
Route::get('/logout', [LoginController::class, "logout"])->name("logout")->middleware("auth");
Route::post('processCredentials', [LoginController::class, "authenticate"]);

Route::resource("/film_serie", FilmSerieController::class);
Route::get("/search", [FilmSerieController::class, "search"]);
Route::post("/post", [PostController::class, "post"]);
Route::get("/post/{id}", [PostController::class, "show"]);
Route::delete("/post/{id}", [PostController::class, "destroy"]);

Route::post("/comment", [CommentController::class, "comment"]);
Route::delete("/comment/{id}", [CommentController::class, "destroy"]);

Route::fallback(function(){ return abort(404); });
