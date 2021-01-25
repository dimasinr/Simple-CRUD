<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Http\Requests\Band\GenreRequest;
use illuminate\Support\Str;
use App\Models\Genre;

class GenreController extends Controller
{
    public function create()
    {
        return view('genres.create', ['title' => 'New genre']);
    }

    public function store(GenreRequest $request)
    {
        Genre::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return back()->with('success' , 'The genre was created');
    }

    public function table()
    {
        return view('genres.table', [
            'genres' => Genre::Paginate(10),
            'title' => 'All Music Genre'
            ]);
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit',[
            'genre' => $genre,
            'title' => "Edit genre : {$genre->name}",
        ]);
    }

    public function update(Genre $genre, GenreRequest $request)
    {
        $genre->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('genres.table')->with('success' , 'The genre was updated');
    }

    public function destroy(Genre $genre)
    {
       $genre->delete();
    }
}
 