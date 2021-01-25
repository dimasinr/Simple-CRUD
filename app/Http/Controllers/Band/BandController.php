<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Models\{Band,Genre,User,Album};
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Nullable;

class BandController extends Controller
{
    public function table()
    {
        if (request()->expectsJson()) {
            return Band::latest()->get(['id','name']);
        }
        return view('bands.table',[
            'bands' => Band::latest()->paginate(15),
            'title' => 'New Band',
        ]);
    }

    public function create()
    {
        return view('bands.create',[
            'genres' => Genre::get(),
            'band' => new Band,
            'submitlabel' => 'Create'
            ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|unique:ba   nds,name',
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpeg,png,gif,jpg' : '',
            'genres' => 'required|array'
        ]);

       $band = Band::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'thumbnail' => request('thumbnail')? request()->file('thumbnail')->store('images/band') : null,
        ]);

        $band->genres()->sync(request('genres'));

        return back()->with('success', 'Band was Created');
    }

    public function edit(Band $band)
    {
        return view('bands.edit',[
            'band' => $band,
            'genres' => Genre::get(),
            'submitlabel' => 'Update'
        ]);
    }
    public function update(Band $band ,Genre $genre)
    {
        dd($band);
        
        request()->validate([
            'name' => 'required|unique:bands,name,' .$band->id,
            'thumbnail' => 'nullable|image|mimes:jpeg,png,gif,jpg',  // 'thumbnail' => request('thumbnail') ? 'image|mimes:jpeg,png,gif' : '',
            'genres' => 'required|array',
        ]);

        if ('thumbnail')
        {
            Storage::delete($band->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('images/band');
        }elseif ($band->thumbnail){
            $thumbnail = $band->thumbnail;
        }else {
            $thumbnail = null;
        }

       $band ->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'thumbnail' => $thumbnail,
        ]);

        $band->genres()->sync(request('genres'));

        return redirect('bands/table')->with('success', 'Band was Update');
    }

    public function destroy(Band $band)
    {
        Storage::delete($band->thumbnail);
        $band->genres()->detach();
        $band->delete();
    }
}
