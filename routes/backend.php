<?php

use App\Http\Controllers\Backend\BackupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;

Route::get('/dashboard', DashboardController::class)->name('dashboard');

// Roles and User
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

// Profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

// Security
Route::get('profile/security', [ProfileController::class, 'changePassword'])->name('profile.password.change');
Route::put('profile/security', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

// Backups
Route::resource('backups', BackupController::class)->only(['index', 'store', 'destroy']);
Route::get('backups/{file_name}', [BackupController::class, 'download'])->name('backups.download');
Route::delete('backups/clean', [BackupController::class, 'clean'])->name('backups.clean');

// Settings
Route::group(['as' => 'settings.', 'prefix' => 'settings'], function() {
    Route::get('general', [SettingController::class, 'general'])->name('general');
    Route::put('general', [SettingController::class, 'generalUpdate'])->name('general.update');

    Route::get('appearance', [SettingController::class, 'appearance'])->name('appearance');
    Route::put('appearance', [SettingController::class, 'appearanceUpdate'])->name('appearance.update');

    Route::get('mail', [SettingController::class, 'mail'])->name('mail');
    Route::put('mail', [SettingController::class, 'mailUpdate'])->name('mail.update');
});