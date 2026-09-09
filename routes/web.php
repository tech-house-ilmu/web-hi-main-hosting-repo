<?php

use App\Http\Controllers\ArticlePageController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\HITCCProgrammeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadersDetailsController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Us
Route::get('/about-us', [LeadersDetailsController::class, 'index'])->name('about');

// Career
Route::prefix('career')->name('career.')->group(function () {
    Route::get('/', [CareerController::class, 'index'])->name('index');
    Route::get('/{division}', [CareerController::class, 'listByDivision'])->name('division');
    Route::get('/{division}/{slug}', [CareerController::class, 'show'])->name('show');
});

// Partnership
Route::prefix('partnership')->name('partnership.')->group(function () {
    Route::view('/', 'pages.partnership.partnership')->name('index');
    Route::view('/partnership-affiliate-details', 'pages.partnership.partnership-affiliate-details.index')->name('affiliate');
    Route::view('/partnership-event-details', 'pages.partnership.partnership-event-details.index')->name('event');
    Route::view('/partnership-details', 'pages.partnership.partnership-details.index')->name('details');
    Route::view('/partnership-konten-details', 'pages.partnership.partnership-konten-details.index')->name('konten');
});

// Programmes & Opportunities
Route::prefix('programme')->name('programme.')->group(function () {
    Route::view('/HI-programmes', 'pages.programme.HI-programmes.index')->name('programmes');
    Route::get('/HI-opportunities', [HITCCProgrammeController::class, 'index'])->name('hi.index');
    Route::get('/HI-opportunities/{category}/{slug}', [HITCCProgrammeController::class, 'show'])->name('hi.show');
});

Route::get('/article', [ArticlePageController::class, 'index'])->name('article.index');
Route::get('/articles/{slug}', [ArticlePageController::class, 'show'])->name('article.show');

// Comments 
Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/captcha/image', [CommentController::class, 'captchaImage'])->name('captcha.image');
// Articles
Route::prefix('article')->name('article.')->group(function () {
    Route::get('/', [ArticlePageController::class, 'index'])->name('index');
    Route::get('/{slug}', [ArticlePageController::class, 'show'])->name('show');
});
// Backward-compatibility redirect/route for /articles/{slug}
Route::get('/articles/{slug}', [ArticlePageController::class, 'show']);
