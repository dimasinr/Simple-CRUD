<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Models\Band;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LyricController extends Controller
{
    public function create()
    {
        return view('lyrics.create',[
            'title' => 'New Lyric'
            ]);
    }

    public function store()
    {
        request()->validate([
            'album' => 'required',
            'band' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $band = Band::find(request('band'));
        
        $band->lyrics()->create([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'body' => request('body'),
            'album_id' => request('album'),
        ]);
        return response()->json(['message' => 'The Lyric was Created into Band ' . $band->name]);
    }
}
