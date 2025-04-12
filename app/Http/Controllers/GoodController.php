<?php

namespace App\Http\Controllers;

use App\Enum\RoleEnum;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GoodController extends Controller
{
    public function all()
    {
        $goods = Good::orderByDesc('updated_at')->get();
        return view('goods.index',[
            'goods' => $goods,
        ]);
    }

    public function find($id)
    {
        $good = Good::findOrFail($id);
        return view('goods.show', ['good' => $good]);
    }

    public function edit($id)
    {
        $good = Good::findOrFail($id);
        return view('goods.edit', ['good' => $good]);
    }

    public function update($id)
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'description' => ['required', 'min:3', 'max:254']
        ]);

        Good::findOrFail($id)->update($attributes);

        return redirect('/goods');
    }

    public function destroy($id)
    {
        Good::findOrFail($id)->delete();
        return redirect('/goods');
    }
}
