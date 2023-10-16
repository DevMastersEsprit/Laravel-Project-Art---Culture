<?php

use App\Http\Controllers\ActorManagementController;
use App\Http\Controllers\EvenementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\EmojiController;

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
Route::resource('/events', EvenementController::class);
// Route::resource('actor-management', \App\Http\Controllers\ActorManagementController::class);

// Get the resource (GET)
Route::get('actor-management', [ActorManagementController::class, 'index'])->name('actor-management.index');
Route::get('actor-management-create', [ActorManagementController::class, 'create'])->name('actor-management.create');
// Route::get('actor-management/{id}', [ActorManagementController::class, 'show'])->name('actor-management.show');
Route::get('actor-management-edit', [ActorManagementController::class, 'edit'])->name('actor-management.edit');

// Create the resource (POST)
Route::post('actor-management', [ActorManagementController::class, 'store'])->name('actor-management.store');

// Update the resource (PUT)
Route::put('actor-management', [ActorManagementController::class, 'update'])->name('actor-management.update');

// Delete the resource (DELETE)
Route::delete('actor-management/{id}', [ActorManagementController::class, 'destroy'])->name('actor-management.destroy');
Route::get('/', function () {
	return redirect('/dashboard'); })->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	// Route::get('/comment',[CommentaireController::class,'index']) ;
	Route::resource('/emoji', EmojiController::class);
	Route::resource('/comment', CommentaireController::class);
	Route::put('/comment/like/{id}', [CommentaireController::class, 'like'])->name("like");
	Route::put('/comment/dislike/{id}', [CommentaireController::class, 'dislike'])->name("dislike");
	Route::post('/comment/addEmoji', [CommentaireController::class, 'addEmoji'])->name('addEmoji');
	Route::post('/comment/remove-emoji', [CommentaireController::class, 'removeEmoji'])->name('comment.removeEmoji');
	
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});