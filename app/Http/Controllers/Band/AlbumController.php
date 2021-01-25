<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Models\{Band,Album};
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Str;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class AlbumController extends Controller
{
    public function create()
    {
        return view('albums.create',[
            'title' => 'New Album',
            'band' => Band::get(),
            'submitLabel' => 'Create',
            'album' => new Album,
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|unique:albums',
            'year' => 'required',
            'band' => 'required',
        ]);
        
        $band = Band::find(request('band'));

        Album::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => request('year'),
        ]);

        return back()->with('success' , 'Album was created into ' . $band->name);
    }

    public function table()
    {
        return view('albums.table',[
            'albums' => Album::Paginate(16),
            'title' => request('slug')
        ]);
    }

    public function edit(Album $album)
    {
        return view('albums.edit',[
            'title' => "Edit Album :{$album->name}",
            'album' => $album,
            'bands' => Band::get(),
            'submitLabel' => 'Update',
        ]);
    }

    public function update(Album $album)
    {
        dd($album);

        request()->validate([
            'name' => 'required|unique:albums,name,' .$album->id,
            'year' => 'required',
            'band' => 'required',
        ]);
        
        $band = Band::find(request('band'));

        $album->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => request('year'),
        ]);

        return redirect()-> route('albums.table')->with('success' , 'Album was updated ');
    }

    public function getAlbumsByBandId(Band $band)
    {
        return $band->albums;
    }

    public function destroy(Album $album)
    {
        $album->delete();
    }
}
