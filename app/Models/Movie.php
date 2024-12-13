<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Director;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Movie extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'id',
    //     'portrait',
    //     'date_of_birth',
    // ];

    public function directors(): BelongsTo{
        return $this->belongsTo(Director::class, 'directed_by');
    }

    public function actors() {
        return $this->belongsToMany(Actor::class, 'actors_movies');
    }

    public function genres() {
        return $this->belongsToMany(Genre::class, 'genres_movies');
    }
    
}
