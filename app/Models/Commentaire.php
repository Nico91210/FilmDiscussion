<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
