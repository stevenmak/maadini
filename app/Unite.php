<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    //
    protected $fillable =
    [
        'abreviation', 'signification',
    ];
    public $timestamps = false;

}
