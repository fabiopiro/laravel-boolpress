<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // me

    // Relazioni
    // Una categoria (1) ha tanti post (*)
    // posts -categories
    public function posts() {
        return $this->hasMany('App\Post');
        // 1 Category hasMany(ha tanti) post
    }

    // me
}
