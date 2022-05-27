<?php

namespace App\Http\Controllers;

use App\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCommande()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCommande()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCommande(Request $request)
    {
        $param = $request->except(['_token']);

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function showCommande(Commande $commande)
    {
        $commandes = Commande::paginate(3);
        return view('commandes.listCommande',['commandes'=> $commandes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function editCommande(Commande $commande, $id)
    {
        $commande = Commande::where('user_id','=',$id)->get();
        return view('commandes.editCommande',['commande'=> $commande ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function updateCommande(Request $request, Commande $commande, $id)
    {
        $param = $request->request->all();
        dd($param);
        $commande = Commande::find($id);

        return redirect('/commandes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroyCommande(Commande $commande, $id)
    {
        $commande = Commande::find($id);
        dd($commande);
        $commande->delete();

        return redirect('/commandes');
    }
}
