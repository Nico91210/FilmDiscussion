<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmSerie extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    public $table = "film_series";

    public function genres()
    {
        return $this->belongsToMany('App\Models\Genre', 'genre_film_serie');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
