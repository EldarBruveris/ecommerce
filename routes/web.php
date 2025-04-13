<?php

use App\Enum\RoleEnum;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Good;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/goods', [GoodController::class, 'all']);
Route::get("/goods/{id}", [GoodController::class, 'find']);
Route::get("/goods/{id}/edit", [GoodController::class, 'edit'])->middleware('auth')->can('edit', Good::class);
Route::patch("/goods/{id}", [GoodController::class, 'update'])->middleware('auth')->can('edit', Good::class);
Route::delete("/goods/{id}", [GoodController::class, 'destroy'])->middleware('auth')->can('edit', Good::class);

Route::get("/register", [RegisteredUserController::class, 'create']);
Route::post("/register", [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
