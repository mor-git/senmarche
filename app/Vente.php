<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    public function produits(){
        return $this->belongsTo('App\Produit','produit_id');
    }
}
