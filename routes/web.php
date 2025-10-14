<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GoatController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ReproductionController;
use App\Http\Controllers\KidController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\FatteningController;
use App\Http\Controllers\RecordLogController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\DashboardController;

// Landing page
Route::get('/', function () {
    return view('landing');
});

// Public articles routes
Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'publicIndex'])->name('public.articles.index');
Route::get('/articles/{article}', [\App\Http\Controllers\ArticleController::class, 'publicShow'])->name('public.articles.show');

// Test route untuk debug
Route::get('/test-login', function () {
    if (Auth::check()) {
        return 'User sudah login: ' . Auth::user()->name . ' (Role: ' . Auth::user()->role . ')';
    }
    return 'User belum login';
});

// Authentication routes
require __DIR__.'/auth.php';

// Protected routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, '__invoke'])->name('dashboard');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
                // Resource routes with role middleware
                Route::middleware('role:admin,peternak')->group(function () {
                    Route::resource('goats', GoatController::class);
                    Route::resource('kandangs', KandangController::class);
                    Route::resource('feeds', FeedController::class);
                    Route::resource('reproductions', ReproductionController::class);
                    Route::resource('kids', KidController::class);
                    Route::resource('healths', HealthController::class);
                    Route::resource('fattenings', FatteningController::class);
                    Route::resource('record-logs', RecordLogController::class);
                    Route::resource('marketings', MarketingController::class);
                    Route::resource('plannings', PlanningController::class);
                });
});
