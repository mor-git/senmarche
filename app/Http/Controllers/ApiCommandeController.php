<?php

namespace App\Http\Controllers;

use App\Commande;
use App\User;
use Illuminate\Http\Request;

class ApiCommandeController extends Controller
{
    function saveCommande(Request $request){

        // $tab = $request->except(['_token']);
        $tab = $request->request->all();
        $commande = new Commande();
        $user = new User();

        if($tab){

            $user->name      = $tab['prenom'];
            $user->phone     = $tab['phone'];
            $user->adresse   = $tab['adresse'];
            $user->email     = null;
            $user->password  = null;
            $user->profil_id = 2;

            $user->save();
            $idUser = $user->id;

            $commande->produit_id      =  $tab['identifiant'];
            $commande->user_id         =  $idUser;
            $commande->nombre          =  $tab['nombre'];
            $commande->prixProduit     =  $tab['prix'];
            $commande->montantCommande =  $tab['montant'];
            $commande->dateCommande    =  date();
        }

        // $commande.save();
    }
}
