<?php

namespace App\Http\Controllers\Web;

use App\Gif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GifController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function processCreate(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'url'   => 'required|url',
        ]);

        $gif = Gif::create($request->all());

        return back()->with('message', 'Your gif has been added.')
                     ->with('state', 'success');
    }

    public function edit()
    {
        return view('edit');
    }

    public function processEdit(Request $request)
    {
        $validatedData = $request->validate([
            'id'    => 'required|integer',
            'title' => 'required|max:255',
            'url'   => 'required|url',
        ]);

        $id = $request->input('id');

        if (!Gif::where('id', '=', $id)->exists()) {
            return back()->with('message', "This entry doesn't exist.")
                         ->with('state', 'error');
        }

        $gif = Gif::find($id);

        $gif->title = $request->input('title');
        $gif->url   = $request->input('url');

        $gif->save();

        return back()->with('message', 'Your gif has been edited.')
                     ->with('state', 'success');
    }

    public function delete()
    {
        return view('delete');
    }

    public function processDelete(Request $request)
    {
        $validatedData = $request->validate([
            'id'    => 'required|integer',
        ]);

        $id = $request->input('id');

        if (!Gif::where('id', '=', $id)->exists()) {
            return back()->with('message', "This entry doesn't exist.")
                         ->with('state', 'error');
        }

        Gif::destroy($id);

        return back()->with('message', 'The gif has been deleted.')
                     ->with('state', 'success');
    }
}
