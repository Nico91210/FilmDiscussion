<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    public function filmsSeries()
    {
        return $this->belongsToMany('App\Models\FilmSerie', 'genre_film_serie');
    }
}
