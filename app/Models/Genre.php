<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function bands()
    {
        return $this->belongsToMany(Band::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
