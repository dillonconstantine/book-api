<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\BookCollection;
use App\Http\Requests\BookUpdate;
use App\Http\Requests\BookStore;
use App\Http\Resources\BookPost;
use App\Http\Resources\BookGet;
use Illuminate\Support\Str;
use App\Book;

class BookController extends ApiController
{
    public function index()
    {
        return new BookCollection(Book::all());
    }

    public function show(Book $book)
    {
        return new BookGet($book);
    }

    public function store(BookStore $request)
    {
        $type = $request->input('data.type');
        $this->checkTypeMatches($type);

        $id = $request->input('data.id');
        $this->checkClientId($id);

        $uuid     = (string) Str::uuid();
        $title    = $request->input('data.attributes.title');
        $author   = $request->input('data.attributes.author');
        $released = $request->input('data.attributes.released');

        $book = Book::create([
                    'uuid'     => $uuid,
                    'title'    => $title,
                    'author'   => $author,
                    'released' => $released,
                ]);

        $location = url()->current() . '/' . $uuid;

        return response(new BookPost($book), 201)
               ->header('Location', $location);
    }

    public function update(BookUpdate $request, Book $book)
    {
        $type = $request->input('data.type');
        $this->checkTypeMatches($type);

        $id = $request->input('data.id');
        $this->checkIdMatches($id);

        $title = $request->input('data.attributes.title');
        if (isset($title)) $book->title = $title;

        $author = $request->input('data.attributes.author');
        if (isset($author)) $book->author = $author;

        $released = $request->input('data.attributes.released');
        if (isset($released)) $book->released = $released;

        $book->updated_at = now();

        $book->save();

        return response(new BookGet($book), 200);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response(null, 204);
    }
}
