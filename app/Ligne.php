<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ligne extends Model
{
    //
    protected $fillable = [
        'quantite', 'mouvement','article_id','unite',
    ];
}
