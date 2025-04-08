<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoodController extends Controller
{
    public function all()
    {
        $goods = Good::all();
        return view('goods.index',[
            'goods' => $goods,
            'isAdmmin' => empty(Auth::user()) ? false : Auth::user()->isAdmin() 
        ]);
    }

    public function find($id){
        $good = Good::find($id);
        return view('goods.show', ['good' => $good]);
    }
}
