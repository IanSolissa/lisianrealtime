<?php

use App\Models\User;
use App\Events\Testingevent;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GrupController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomChatController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Models\Message;
use App\Models\RoomChat;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/post', function () {
//     // Testingevent::dispatch(User::first());
//     // broadcast(new Testingevent("hai"));
//     return view('testingevent');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

Route::resource('/',LoginController::class)->middleware('guest');
Route::post('/logout',[LoginController::class,'logout'])->middleware('auth');

Route::resource('/homepage',HomepageController::class)->middleware('auth');
Route::resource('/lisianchat/roomchat',RoomChatController::class)->middleware('auth');
Route::resource('/lisianchat/contact',ContactController::class)->middleware('auth');
Route::resource('/lisianchat',LandingpageController::class)->middleware('auth');
// Route::resource('/lisianchat',LandingpageController::class)->only(['get','edit'])->middleware('auth');
Route::resource('/register',UserController::class)->middleware('guest');    
Route::resource('/message',MessageController::class)->middleware('auth');
Route::resource('/lisianchat/grup',GrupController::class)->middleware('auth');
Route::post('/lisianchat/grup/{id:grups}',[GrupController::class,'message'])->middleware('auth');
Route::get('/lisianchat/grup/{id:grups}/addmember',[GrupController::class,'addMember'])->middleware('auth');
Route::get('/lisianchat/grup/{id:grups}/file',[GrupController::class,'file'])->middleware('auth');
// Route::resource('/room',RoomController::class);