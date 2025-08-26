<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SlideController;
use App\Http\Middleware\EnsureRootUser;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/join', function () {
    return view('join');
})->name('join');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ユーザー
Route::middleware(['auth', EnsureRootUser::class])->group(function () {
    /*
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    */
    Route::get('/users/admin', [UserController::class, 'admin'])->name('users.admin');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

// 活動レポート
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::middleware('auth')->group(function () {
    Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
    Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');
    Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');
    Route::get('reports/admin', [ReportController::class, 'admin'])->name('reports.admin');    
});

// スライド
Route::get('/slides', [SlideController::class, 'index'])->name('slides.index');
Route::middleware('auth')->group(function () {
    Route::get('/slides/create', [SlideController::class, 'create'])->name('slides.create');
    Route::post('/slides', [SlideController::class, 'store'])->name('slides.store');
    Route::get('/slides/{slide}/edit', [SlideController::class, 'edit'])->name('slides.edit');
    Route::put('/slides/{slide}', [SlideController::class, 'update'])->name('slides.update');
    Route::delete('/slides/{slide}', [SlideController::class, 'destroy'])->name('slides.destroy');
    Route::get('slides/admin', [SlideController::class, 'admin'])->name('slides.admin');
});

// お知らせ
Route::get('/notices', [NoticeController::class, 'index'])->name('notices.index');
Route::middleware('auth')->group(function () {
    Route::get('/notices/create', [NoticeController::class, 'create'])->name('notices.create');
    Route::post('/notices', [NoticeController::class, 'store'])->name('notices.store');
    Route::get('/notices/{notice}/edit', [NoticeController::class, 'edit'])->name('notices.edit');
    Route::put('/notices/{notice}', [NoticeController::class, 'update'])->name('notices.update');
    Route::delete('/notices/{notice}', [NoticeController::class, 'destroy'])->name('notices.destroy');
    Route::get('notices/admin', [NoticeController::class, 'admin'])->name('notices.admin');
});

// 行事予定
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::middleware('auth')->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('events/admin', [EventController::class, 'admin'])->name('events.admin');
});

// 公開文書
Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');
Route::middleware('auth')->group(function () {
    Route::get('documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    Route::get('documents/admin', [DocumentController::class, 'admin'])->name('documents.admin');
});


require __DIR__ . '/auth.php';

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

