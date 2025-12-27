<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WebsiteController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->name('admin.')->group(function () {
    
    /* =========================
        Dashboard
    ========================= */
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    /* =========================
        Profile
    ========================= */
    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', 'show')->name('show');
        Route::post('/update/{id}', 'update')->name('update');
    });

    /* =========================
        Projects
    ========================= */
    Route::controller(ProjectController::class)->prefix('projects')->name('projects.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}','destroy')->name('destroy');
        Route::delete('/multi-destroy', 'multiDestroy')->name('multi_destroy');
        Route::get('/visibility-change/{id:id}', 'visibilityChange')->name('visibility');
    });

    /* =========================
        Contacts
    ========================= */
    Route::controller(ContactController::class)->prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/contacts/{id}', 'show')->name('show');
        Route::delete('/destroy/{id}','destroy')->name('destroy');
        Route::delete('/multi-destroy', 'multiDestroy')->name('multi_destroy');
    });
});

// Run the Artisan commands
Route::get('/clear-all', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('event:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return "Artisan commands executed successfully!";
});

Route::get('/cache', function() {
    Artisan::call('config:cache');
    Artisan::call('event:cache');
    return "Artisan commands executed successfully!";
});