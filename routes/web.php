<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticlePageController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\LeadersDetailsController;
use App\Http\Controllers\HITCCProgrammeController;

/******************************** HOME *********************************************/ 

Route::get('/', [HomeController::class, 'index'])->name('home');

/******************************** ABOUT *********************************************/ 

Route::get('/about-us', [LeadersDetailsController::class, 'LeadersDetails'])->name('about');

/******************************** CAREER *********************************************/ 

Route::get('/career', [CareerController::class, 'index']);
Route::get('/career/{division}', [CareerController::class, 'listByDivision']);
Route::get('/career/{division}/{slug}', [CareerController::class, 'show']);

/********************************** PARTNERSHIP ******************************************/ 

Route::prefix('partnership')->group(function () {
    Route::view('/', 'pages.partnership.partnership');

    Route::view('/partnership-affiliate-details', 'pages.partnership.partnership-affiliate-details.index');
    Route::view('/partnership-event-details', 'pages.partnership.partnership-event-details.index');
    Route::view('/partnership-details', 'pages.partnership.partnership-details.index');
    Route::view('/partnership-konten-details', 'pages.partnership.partnership-konten-details.index');
});

/************************************** PROGRAMMES ****************************************/ 

Route::get('/programme/HI-programmes/', function () {
    return view('pages.programme.HI-programmes.index');
});

Route::get('/programme/HI-opportunities', [HITCCProgrammeController::class, 'index'])->name('programme.hi.index');
Route::get('/programme/HI-opportunities/{category}/{slug}', [HITCCProgrammeController::class, 'show'])->name('programme.hi.show');

/****************************************** ARTICLE *********************************/ 

Route::get('/article', [ArticlePageController::class, 'index'])->name('article.index');
Route::get('/articles/{slug}', [ArticlePageController::class, 'show'])->name('article.show');