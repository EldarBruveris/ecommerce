<?php

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