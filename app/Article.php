<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //les attributs fallible
    protected $fillable = [
        'codeArticle', 'designation','prix','qteMin','qteInitial', 'qteActuelle','unite',
        'description', 'etat','categorie_id','fournisseur_id','user_id','prix_ventes','date_expiration',

    ];
    //les articles demeure de la categorie
    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }

}
