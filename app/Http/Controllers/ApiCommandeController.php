<?php

namespace App\Http\Controllers;

use App\Commande;
use App\User;
use Illuminate\Http\Request;

class ApiCommandeController extends Controller
{
    function saveCommande(Request $request){

        $tab = $request->request->all();
        $panier = $tab["all"];
        $infoClient = $tab["info"];
       
     
        $user = new User();

        $user->name      = $infoClient['prenom'];
        $user->phone     = $infoClient['phone'];
        $user->adresse   = $infoClient['adresse'];
        // $user->email     = "";
        // $user->password  = "";
        $user->profil_id = 1;
        $user->save();
        foreach($panier as $item){
            $commande = new Commande();
            $commande->produit_id      =  $item['id'];
            $commande->user_id         =  $user->id;
            $commande->nombre          =  $item['quantite'];
            $commande->prixProduit     =  $item['prix'];
            $commande->montantCommande =  $item['montant'];
            $commande->dateCommande    =  date("Y-m-d");
            $commande->save();
        }
           
        
       return 1;
    }
}