<?php

use Illuminate\Support\Facades\Route;
use Skcin7\LaravelGlobalSettings\Http\Controllers\LaravelGlobalSettingsController;

Route::get('/', [LaravelGlobalSettingsController::class, 'index'])->name('index');
Route::get('about', [LaravelGlobalSettingsController::class, 'about'])->name('about');
Route::get('info', [LaravelGlobalSettingsController::class, 'info'])->name('info');
Route::get('github', [LaravelGlobalSettingsController::class, 'github'])->name('github');
Route::post('/', [LaravelGlobalSettingsController::class, 'create'])->name('create');
Route::put('{key}', [LaravelGlobalSettingsController::class, 'update'])->name('update');
Route::delete('{key}', [LaravelGlobalSettingsController::class, 'delete'])->name('delete');
