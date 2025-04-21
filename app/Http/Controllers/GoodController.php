<?php

namespace App\Http\Controllers;

use App\Enum\RoleEnum;
use App\Models\Good;
use App\Services\GoodService;
use Illuminate\Auth\Events\Validated;
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

    public function create(){
        return view('goods.create');
    }

    public function post()
    {
        $validated = request()->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'description' => ['required', 'min:3', 'max:254'],
            'cost' => ['numeric', 'min:1'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],   
        ]);
        if (request()->hasFile('image')) {
            $image = request()->file('image');            
            $imageName = time() . '.' . request()->file('image')->extension();
            $path = $image->storeAs('public/', $imageName);
            $validated['image'] = str_replace('public/', 'storage/', $path);
        }

        $create = new GoodService;
        $create->create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'cost' => $validated['cost'],
            'img_url' => $validated['image'] ?? ''
        ]);

        return redirect('/goods');
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

        if (request()->hasFile('image')) {
            
            $image = request()->file('image');            
            $imageName = time() . '.' . request()->file('image')->extension();
            $path = $image->storeAs('public/', $imageName);
            $validated['image'] = str_replace('public/', 'storage/', $path);
        }
        
        
        
        $update = new GoodService;
        $update->update($good ,[
            'name' => $validated['name'],
            'desription' => $validated['description'],
            'img_url' => $validated['image']
        ]);
        

        return redirect('/goods');
    }

    public function destroy($id)
    {
        Good::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Good is deleted']);
    }
}
