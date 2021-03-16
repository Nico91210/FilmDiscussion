<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function isAdmin()
    {
        return $this->libelle == "Admin";
    }

    static public function getUserId()
    {
        return DB::table('roles')->select('id')->where('libelle', 'User')->first()->id;
    }
}
