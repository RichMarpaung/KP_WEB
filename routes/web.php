<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\MustAdmin;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard')->middleware(['auth',MustAdmin::class]);

    Route::get('/user',[UserController::class, 'show'])->name('user.list')->middleware(['auth',MustAdmin::class]);
    Route::get('/edit/{id}/user',[UserController::class, 'edit'])->name('user.edit')->middleware(['auth',MustAdmin::class]);
    Route::put('/update/{id}/user',[UserController::class, 'update'])->name('user.update')->middleware(['auth',MustAdmin::class]);
    Route::post('/delete/{id}/user',[UserController::class, 'destroy'])->name('user.delete')->middleware(['auth',MustAdmin::class]);
    Route::get('/create-user',[UserController::class, 'create'])->name('user.create')->middleware(['auth',MustAdmin::class]);
    // Route::post('/create-user',[UserController::class, 'storeFromAdmin'])->name('user.upload');
    Route::post('/create-user',[AdminController::class, 'upload'])->name('user.upload')->middleware(['auth',MustAdmin::class]);

    Route::get('/place',[AdminController::class, 'placelist'])->name('place.list')->middleware(['auth',MustAdmin::class]);
    Route::get('/create-place',[AdminController::class, 'placecreate'])->name('place.create')->middleware(['auth',MustAdmin::class]);
    Route::post('/create-place',[PlaceController::class, 'store'])->name('place.store')->middleware(['auth',MustAdmin::class]);
    Route::delete('/delete/{id}/place',[PlaceController::class, 'destroy'])->name('place.delete')->middleware(['auth',MustAdmin::class]);
    // Route::delete('/delete/{id}/place', [PlaceController::class, 'destroy'])->name('admin.user.delete')->middleware(['auth', MustAdmin::class]);

})->middleware(['auth',MustAdmin::class]);



#auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authlogin'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');





// User Route
// Route::get('/team', function () {
//     return view('userpage.team');
// })->middleware('auth');
Route::get('/', [UserController::class, 'dashboard'])->middleware('auth');
Route::get('/team', [UserController::class, 'team'])->middleware('auth');
Route::get('/list-places', [LocationController::class, 'listplaces']);
Route::get('/ranked-places', [LocationController::class, 'showRankedPlaces']);
Route::get('/review/{id}', [ReviewController::class, 'show'])->name('review_tempat');
Route::post('/store/coment', [ReviewController::class, 'store'])->name('store.coment');
