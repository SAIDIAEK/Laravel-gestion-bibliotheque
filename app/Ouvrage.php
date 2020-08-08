<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ouvrage extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at']; 

    public function auteur(){
        return $this->belongsTo('App\Auteur');
    }

    public function edition(){
        return $this->belongsTo('App\Edition');
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }
}
