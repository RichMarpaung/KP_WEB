<?php

use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('userpage.master');
});
Route::get('/register', function () {
    return view('loginpage.register');
})->name('register');
Route::post('/register',[UserController::class, 'store'])->name('register.store');
Route::get('/komen', function () {
    return view('userpage.komen');
});
Route::get('/get-location', function () {
    return view('get-location');
});

Route::get('/landing2', function () {
    return view('loginpage.login');
});
Route::get('/landing', [PlaceController::class, 'index'])->name('list_tempat');
Route::get('/review/{id}', [ReviewController::class, 'show'])->name('review_tempat');

Route::post('/nearest-places', [LocationController::class, 'nearestPlaces']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authlogin'])->name('login.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
