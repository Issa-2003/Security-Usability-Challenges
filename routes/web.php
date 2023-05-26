<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePageController;
use Illuminate\Support\Facades\Route;

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
    return view('profilepage');
});

Route::get('/about', function () {
    return view('about');
})->middleware(['auth', 'verified'])->name('login');

Route::get('/blog', function () {
    return view('blog');
})->middleware(['auth', 'verified'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profilepage', function () {
    return view('profilepage');
})->middleware(['auth', 'verified'])->name('profilepage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/500', function () {
   abort(500);
});

require __DIR__.'/auth.php';
