<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    public function filmSerie()
    {
        return $this->belongsTo('App\Models\FilmSerie', 'film_serie_id');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function commentaires()
    {
        return $this->hasMany('App\Models\Commentaire');
    }
}
