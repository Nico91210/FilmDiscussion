<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    public function __construct()
    {
        $this->lu = false;
    }

    public function receiver()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function commentaire()
    {
        return $this->belongsTo("App\Models\Commentaire", "commentaire_id");
    }
}
