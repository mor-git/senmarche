<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function categories(){
        return $this->belongsTo('App\Categorie','categorie_id');
    }
}
