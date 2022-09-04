<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

    //les articles faillible
    protected $fillable = [
        'codecategorie', 'designation',

    ];
    //un categorie possede plusieurs articles
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    //generation automatique du code categorie
    public static function boot()
     {
         parent::boot();

         static::creating(function ($categorie) {
             $current_prefix = "CAT";
             $categorie->id = Categorie::max('id') + 1;
             $categorie->codecategorie = $current_prefix . '-' . str_pad(
                 $categorie->id,
                 4, // as per your requirement.
                 '0',
                 STR_PAD_LEFT
             );
         });
    }
}
