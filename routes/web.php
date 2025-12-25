<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SuccessStoryController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('members', MemberController::class);
Route::get('members-export', [MemberController::class, 'export'])->name('members.export');

Route::resource('events', EventController::class);

Route::get('/success-stories', [SuccessStoryController::class, 'allIndex'])->name('success-stories.index');
Route::resource('members.success-stories', SuccessStoryController::class);
