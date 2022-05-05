<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



use App\Http\Controllers\ListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CardController;    


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/cards', CardController::class);
Route::put('/cards/img/{id}', [CardController::class, 'removeIMG'])->name('card.removeIMG');

Route::resource('/app', ListController::class);

Route::resource('/user', UserController::class);

Route::put('/user/img/{id}', [UserController::class, 'remove'])->name('img.remove');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks');

Route::get('/edit', [App\Http\Controllers\EditController::class, 'edit'])->name('edit');
Route::put('/update', [App\Http\Controllers\EditController::class, 'update'])->name('update');
