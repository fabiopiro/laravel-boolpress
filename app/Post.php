<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // FILLABLE
    protected $fillable = [
        'title',
        'slug',
        'content',
        // category_id - aggiunto! Relazioni!
        'category_id',
    ];
    // FILLABLE

    //Relazioni
    // Una categoria (1) ha tanti post (*)
    // posts -categories
    public function category() {
        return $this->belongsTo('App\Category');
        // 1 Post belongTo (Appartiene) a 1 categoria
    }
}
