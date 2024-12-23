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




// Route::get('/register', function () {
//     return view('loginpage.register');
// })->name('register');
// Route::post('/register',[UserController::class, 'store'])->name('register.store');

Route::get('/get-location', function () {
    return view('lokasi01');
});
Route::get('/', function () {
    return view('userpage.master');
})->middleware('auth');
Route::post('/nearest-places', [LocationController::class, 'nearestPlaces']);

Route::get('/places', [LocationController::class, 'showPlacesView']);

// Route untuk API (mengambil tempat terdekat)
Route::post('/api/places-nearby', [LocationController::class, 'getNearestPlacesWithDistance']);

// Route::get('/', [PlaceController::class, 'index'])->name('list_tempat')->middleware('auth');
Route::get('/review/{id}', [ReviewController::class, 'show'])->name('review_tempat');
Route::post('/store/coment', [ReviewController::class, 'store'])->name('store.coment');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard')->middleware(['auth',MustAdmin::class]);

    Route::get('/user',[UserController::class, 'show'])->name('user.list')->middleware(['auth',MustAdmin::class]);
    Route::get('/edit/{id}/user',[UserController::class, 'edit'])->name('user.edit')->middleware(['auth',MustAdmin::class]);
    Route::post('/update/{id}/user',[UserController::class, 'update'])->name('user.update')->middleware(['auth',MustAdmin::class]);
    Route::post('/delete/{id}/user',[UserController::class, 'destroy'])->name('user.delete')->middleware(['auth',MustAdmin::class]);
    Route::get('/create-user',[UserController::class, 'create'])->name('user.create')->middleware(['auth',MustAdmin::class]);
    // Route::post('/create-user',[UserController::class, 'storeFromAdmin'])->name('user.upload');
    Route::post('/create-user',[AdminController::class, 'upload'])->name('user.upload')->middleware(['auth',MustAdmin::class]);

    Route::get('/place',[AdminController::class, 'placelist'])->name('place.list')->middleware(['auth',MustAdmin::class]);
    Route::get('/create-place',[AdminController::class, 'placecreate'])->name('place.create')->middleware(['auth',MustAdmin::class]);
    Route::post('/create-place',[PlaceController::class, 'store'])->name('place.store')->middleware(['auth',MustAdmin::class]);
    Route::post('/delete/{id}/place',[PlaceController::class, 'destroy'])->name('place.delete')->middleware(['auth',MustAdmin::class]);
})->middleware(['auth',MustAdmin::class]);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authlogin'])->name('login.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');








// Route untuk menampilkan hasil ranking tempat
Route::get('/list-places', [LocationController::class, 'listplaces']);
Route::get('/ranked-places', [LocationController::class, 'showRankedPlaces']);
