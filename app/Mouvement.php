<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    //
    protected $fillable =
    [
        'benificiaire', 'type_id','reference','motif', 'datemouvement','user_id','montamt','reduction','total'
    ];

    public static function boot()
     {
         parent::boot();

         static::creating(function ($mouvement)
         {
             if($mouvement->type_id == 1)
             {
                $current_prefix = "ACHAT";
                $mouvement->id = Mouvement::select('id','type_id')->where("type_id","=","1")->max('id') +1;
                $mouvement->reference = $current_prefix . '-' . str_pad($mouvement->id,5, '0',STR_PAD_LEFT);
             }
             elseif($mouvement->type_id == 2)
             {
                $current_prefix = "VENTE";
                $mouvement->id = Mouvement::select('id','type_id')->where("type_id","=","2")->max('id') +1;
                $mouvement->reference = $current_prefix . '-' . str_pad($mouvement->id,5, '0',STR_PAD_LEFT);

             }
             else
             {
                $current_prefix = "AJUSTEMENT";
                $mouvement->id = Mouvement::select('id','type_id')->where("type_id","=","3")->max('id') +1;
                $mouvement->reference = $current_prefix . '-' . str_pad($mouvement->id,5, '0',STR_PAD_LEFT);
             }


         });
    }

}
