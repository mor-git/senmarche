<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class ApiProduitController extends Controller
{
    public function showProduitLegume(){
        // $produits = Produit::all();
        $produits = Produit::latest()->where([
            'categorie_id' => 1,
            'statut' => 1
        ])->get();
        return json_encode($produits);
    }
    public function showOneLegume($id)
    {
        $produit = Produit::find($id);
        return json_encode($produit);
    }

    public function showProduitPoulet(){
        $produits = Produit::latest()->where([
            ['categorie_id','=', 2],
            ['statut', '=', 1]
        ])->get();
        return json_encode($produits);
    }

    public function showProduitViande(){
        $produits = Produit::latest()->where([
            ['categorie_id','=', 3],
            ['statut', '=', 1]
        ])->get();
        return json_encode($produits);
    }
}
