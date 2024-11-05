<?php

declare(strict_types=1);

use App\Http\Controllers\Actions\GetUserListAction;
use App\Http\Controllers\Actions\UserLoginAction;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', UserLoginAction::class)->name('auth.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user-list', GetUserListAction::class);

    Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
        Route::post('/', 'create')->name('create');
        Route::patch('/{user}', 'update')->name('update');
        Route::delete('/{user}', 'destroy')->name('destroy');
    });
});
