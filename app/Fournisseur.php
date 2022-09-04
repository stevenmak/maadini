<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    //les assignements de masse
    protected $fillable = [
        'nom', 'telephone','email','adresse',

    ];
    
}
