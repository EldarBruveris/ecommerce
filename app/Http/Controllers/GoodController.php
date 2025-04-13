<?php

namespace App\Http\Controllers;

use App\Enum\RoleEnum;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
        $validated = request()->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'description' => ['required', 'min:3', 'max:254'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048']  
        ]);
        
        $good = Good::findOrFail($id);
        
        $good->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);
        
        if (request()->hasFile('image')) {
            $image = request()->file('image');            
            $imageName = time() . '.' . request()->file('image')->extension();
            $path = $image->storeAs('public/goods', $imageName);
            
            $good->update([
                'image_url' => str_replace('public/', '', $path)
            ]);
        }

        return redirect('/goods');
    }

    public function destroy($id)
    {
        Good::findOrFail($id)->delete();
        return redirect('/goods');
    }
}
