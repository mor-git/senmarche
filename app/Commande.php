<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{

    public function produits(){
        return $this->belongsTo('App\Produit','produit_id');
    }
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
}
