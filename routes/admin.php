<?php

use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Admin\EducationLevelController as AdminEducationLevelController;
use App\Http\Controllers\Admin\FigureController as AdminFigureController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\StructureController as AdminStructureController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
        Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.attempt');
    });

    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('berita', AdminNewsController::class)->names('admin.news')->parameters(['berita' => 'article']);
        Route::resource('kegiatan', AdminActivityController::class)->names('admin.activities')->parameters(['kegiatan' => 'activity']);
        Route::resource('tokoh', AdminFigureController::class)->names('admin.figures')->parameters(['tokoh' => 'figure']);
        Route::resource('pendidikan', AdminEducationLevelController::class)->names('admin.education')->parameters(['pendidikan' => 'level']);
        Route::resource('struktur', AdminStructureController::class)->names('admin.structures')->parameters(['struktur' => 'structure']);
        Route::resource('dokumen', AdminDocumentController::class)->names('admin.documents')->parameters(['dokumen' => 'document']);
        Route::resource('kategori', AdminCategoryController::class)->only(['index', 'store', 'update', 'destroy'])->names('admin.categories')->parameters(['kategori' => 'category']);
        Route::resource('pesan', AdminMessageController::class)->only(['index', 'show', 'destroy'])->names('admin.messages');

        Route::get('pengaturan', [AdminSettingController::class, 'index'])->name('admin.settings');
        Route::post('pengaturan', [AdminSettingController::class, 'update'])->name('admin.settings.update');
    });
});