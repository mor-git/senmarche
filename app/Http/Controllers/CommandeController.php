<?php

namespace App\Http\Controllers;

use App\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCommande($id)
    {
        $commandes = Commande::where('user_id', $id )->distinct('created_at','user_id')->get();
        dd($commandes);
        return view('commandes.listCommande',['commandes'=> $commandes]);
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

    public function recherche(Request $request){
        $elements = $request->input('chearch');
        $results  = Commande::where('user_id','like','%$elements%')->get();
                    // ->orwhere('dateCommande','like','%elements%')
                    // ->paginate(5);
        dd($results);
        return view('commandes.recherche',['commandes'=> $results]);
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
        // $categProf = Auth::user()->categorieProfil;
        // $commandes = Commande::whereIn('categorie_id',[2,3])->join('produits', 'commandes.produit_id', '=', 'produits.id')->get();
        // dd($commandes);
        switch(Auth::user()->categorieProfil) {
            case('1'):
                $commandes = Commande::paginate(10);
                return view('commandes.listCommande',['commandes'=> $commandes]);
                break;
            case('2'):
                $commandes = Commande::where('categorie_id',1)->join('produits', 'commandes.produit_id', '=', 'produits.id')->latest('commandes.created_at')->paginate(8);
                return view('commandes.listCommande',['commandes'=> $commandes]);
                break;
            case('3'):
                $commandes = Commande::whereIn('categorie_id',[2,3])->join('produits', 'commandes.produit_id', '=', 'produits.id')->latest('commandes.created_at')->paginate(8);
                return view('commandes.listCommande',['commandes'=> $commandes]);
                break;
            case('4'):
                $commandes = Commande::where('categorie_id',4)->join('produits', 'commandes.produit_id', '=', 'produits.id')->latest('commandes.created_at')->paginate(8); 
                return view('commandes.listCommande',['commandes'=> $commandes]);
                break;
            default:
                
        }
 
        // return view('commandes.listCommande',['commandes'=> $commandes]);
    
        // $commandes = Commande::select('user_id','aPayer','created_at')->distinct('created_at','user_id')->paginate(5);
        // // dd($commandes);
        // return view('commandes.listCommande',['commandes'=> $commandes]);
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

        return redirect('/commandes')->with('messageUpdate','Commande modifiée avec succès !!!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroyCommande(Request $request, Commande $commande)
    {
        $date = $request->input('dateSup');
        $client = $request->input('client');
        dd($date);
        $commande = Commande::where('dateCommande', $date)->orWhere('user_id', $client)->get();
        // $commande = Commande::where('user_id', $id)->where('dateCommande', $date)->get();
        dd($commande);
        $commande->delete();

        return redirect('/commandes')->with('messageDelete','Commande supprimée avec succès !!!');
    }
}
