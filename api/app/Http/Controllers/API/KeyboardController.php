<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Keyboard;
use Illuminate\Http\Request;

class KeyboardController extends Controller
{
    // controller functions for keyboard (App\Models\Keyboard), keyboard key: name: api response
    //show
    public function show($product_id)
    {
        $keyboard = Keyboard::firstWhere('product_id', $product_id);
        if(!$keyboard) {
            return response()->json(['message' => 'Keyboard not found'], 404);
        }
        return response()->json($keyboard);
    }
    public function store(Request $request)
    {
        $keyboard = Keyboard::create($request->all());
        if(!$keyboard) {
            return response()->json(['message' => 'Keyboard not created'], 404);
        }
        return response()->json($keyboard);
    }
    public function update(Request $request, $keyboard_id)
    {
        $keyboard = Keyboard::firstWhere('product_id', $keyboard_id);
        if(!$keyboard) {
            return response()->json(['message' => 'Keyboard not updated'], 404);
        }
        $keyboard->update($request->all());
        return response()->json($keyboard, 200);
    }
}
