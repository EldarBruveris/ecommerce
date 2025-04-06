<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Good;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/goods', function () {
    $goods = Good::all();

    return view('goods.index',[
        'goods' => $goods
    ]);
});

Route::get("/goods/{id}", function($id){
    $good = Good::find($id);

    return view('goods.show', ['good' => $good]);
});

Route::get("/register", [RegisteredUserController::class, 'create']);
Route::post("/register", [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);