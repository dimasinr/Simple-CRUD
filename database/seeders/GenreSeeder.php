<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = collect([
        'Pop',
        'Punk',
        'Metal',
        'J-Pop',
        'K-Pop',
        'Pop Punk',
        'Classic',
        'Indie',
        'Reggae',
        'Emo',
        'EDM',
        ]);

        $genres->each(function($genre){
        Genre::create([
            'name' => $genre,
            'slug' => Str::slug($genre),
            ]);
        }); 
    }
}
