<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/gallery', [ArtworkController::class,'index'])->name('gallery');
Route::get('/artworks/{id}', [ArtworkController::class,'show'])->name('artworks.show');

Route::get('/artists', [ArtistController::class,'index'])->name('artists.index');
Route::get('/artists/{id}', [ArtistController::class,'show'])->name('artists.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'create'])->name('password.confirm');
    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/artworks/create', [ArtworkController::class,'create'])->name('artworks.create');
    Route::post('/artworks', [ArtworkController::class,'store'])->name('artworks.store');
    Route::get('/artworks/{artwork}/edit', [ArtworkController::class,'edit'])->name('artworks.edit');
    Route::put('/artworks/{artwork}', [ArtworkController::class,'update'])->name('artworks.update');
    Route::delete('/artworks/{artwork}', [ArtworkController::class,'destroy'])->name('artworks.destroy');

    Route::post('/artworks/{id}/comments', [CommentController::class,'store'])->name('comments.store');
    Route::post('/artworks/{id}/ratings', [RatingController::class,'store'])->name('ratings.store');
    Route::post('/artworks/{id}/like', [LikeController::class,'toggle'])->name('likes.toggle');
});

Route::middleware(['auth','checkrole:admin'])->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class,'index'])->name('admin.index');
    Route::get('/review/{id}', [AdminController::class,'review'])->name('admin.review');
    Route::post('/moderate/{id}', [AdminController::class,'moderate'])->name('admin.moderate');
});
