<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auteur extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at']; 
    
    public function ouvrages(){
        return $this->hasMany('App\Ouvrage');
    }
}
