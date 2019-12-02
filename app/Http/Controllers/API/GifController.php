<?php

namespace App\Http\Controllers\API;

use App\Gif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GifController extends Controller
{
    public function index()
    {
        return Gif::all();
    }

    public function show(Gif $gif)
    {
        return $gif;
    }

    public function store(Request $request)
    {
        $gif = Gif::create($request->all());

        return response()->json($gif, 201);
    }

    public function update(Request $request, Gif $gif)
    {
        $gif->update($request->all());

        return response()->json($gif, 200);
    }

    public function destroy(Gif $gif)
    {
        $gif->delete();

        return response()->json(null, 204);
    }
}
