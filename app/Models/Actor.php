<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'portrait',
        'date_of_birth',
    ];


    public function movies() {
        return $this->belongsToMany(Movie::class, 'actors_movies', 'actor_id', 'movie_id');
    }
    
}
