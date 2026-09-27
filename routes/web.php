<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StructureController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::prefix('tentang')->name('about.')->group(function () {
    Route::get('sejarah', [AboutController::class, 'history'])->name('history');
    Route::get('visi-misi', [AboutController::class, 'vision'])->name('vision');
});

Route::get('biografi', [BiographyController::class, 'index'])->name('biographies.index');
Route::get('biografi/{figure:slug}', [BiographyController::class, 'show'])->name('biographies.show');

Route::get('struktur', [StructureController::class, 'index'])->name('structures.index');

Route::get('pendidikan', [EducationController::class, 'index'])->name('education.index');
Route::get('pendidikan/{level:slug}', [EducationController::class, 'show'])->name('education.show');

Route::get('berita', [NewsController::class, 'index'])->name('news.index');
Route::get('berita/arsip', [NewsController::class, 'archive'])->name('news.archive');
Route::get('berita/{article:slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('kegiatan', [ActivityController::class, 'index'])->name('activities.index');
Route::get('kegiatan/kalender', [ActivityController::class, 'calendar'])->name('activities.calendar');
Route::get('kegiatan/{activity:slug}', [ActivityController::class, 'show'])->name('activities.show');

Route::get('download', [DocumentController::class, 'index'])->name('documents.index');
Route::get('download/{document:slug}/unduh', [DocumentController::class, 'download'])->name('documents.download');

Route::get('kontak', [ContactController::class, 'index'])->name('contact');
Route::post('kontak', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:5,1');