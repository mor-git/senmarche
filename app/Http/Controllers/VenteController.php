<?php

namespace App\Http\Controllers;

use App\Vente;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexVente()
    {
        $user = Auth::user()->categorieProfil;
        if($user === 1){
            $ventes = Vente::latest()->paginate(5);
            return view('ventes.listVente',['ventes'=> $ventes ]);
        }elseif($user === 2){
            $ventes = Vente::join('produits', 'ventes.produit_id','=','produits.id')->where('categorie_id',1)->latest('ventes.created_at')->paginate(5);
            return view('ventes.listVente',['ventes'=> $ventes ]);
        }elseif($user === 3){
            $ventes = Vente::join('produits', 'ventes.produit_id','=','produits.id')->whereIn('categorie_id',[2, 3])->latest('ventes.created_at')->paginate(5);
            return view('ventes.listVente',['ventes'=> $ventes ]);
        }elseif($user === 4){
            $ventes = Vente::join('produits', 'ventes.produit_id','=','produits.id')->where('categorie_id',4)->latest('ventes.created_at')->paginate(5);
            return view('ventes.listVente',['ventes'=> $ventes ]);
        }else{
            echo('Page Indisponible');
        }
        // $ventes = Vente::latest()->paginate(5);
        // return view('ventes.listVente',['ventes'=> $ventes ]);
    }

    public function detailVente(){
        return view('ventes.detailsVente');
    }
    public function selectVente(Request $request){
        $dateDebut = $request->dateDebut;
        $dateFin = $request->dateFin;

        $user = Auth::user()->categorieProfil;
        if($user === 1){
            $ventes = Vente::whereBetween('dateVente',[$dateDebut,$dateFin])->latest()->paginate(5);
            return json_encode($ventes);
        }elseif($user === 2){
            $ventes = Vente::join('produits', 'ventes.produit_id','=','produits.id')->where('categorie_id',1)->whereBetween('dateVente',[$dateDebut,$dateFin])->latest('ventes.created_at')->paginate(5);
            return json_encode($ventes);
        }elseif($user === 3){
            $ventes = Vente::whereBetween('dateVente',[$dateDebut,$dateFin])->join('produits', 'ventes.produit_id','=','produits.id')->whereIn('categorie_id',[2, 3])->latest('ventes.created_at')->paginate(5);
            return json_encode($ventes);
        }elseif($user === 4){
            $ventes = Vente::join('produits', 'ventes.produit_id','=','produits.id')->where('categorie_id',4)->whereBetween('dateVente',[$dateDebut,$dateFin])->latest('ventes.created_at')->paginate(5);
            return json_encode($ventes);
        }else{
            echo('Page Indisponible');
        }
        // $ventes = Vente::with('produits')->whereBetween('dateVente',[$dateDebut,$dateFin])->get();

        // dd($ventes);
        // return json_encode($ventes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVente()
    {
        $user = Auth::user()->categorieProfil;
        if($user === 1){
            $produits = Produit::all();
            return view('ventes.addVente')->with('produits',$produits);
        }elseif($user === 2){
            $produits = Produit::where('categorie_id',1)->get();
            return view('ventes.addVente')->with('produits',$produits);
        }elseif($user === 3){
            $produits = Produit::whereIn('categorie_id', [2, 3])->get();
            return view('ventes.addVente')->with('produits',$produits);
        }elseif($user === 4){
            $produits = Produit::where('categorie_id',4)->get();
            return view('ventes.addVente')->with('produits',$produits);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function aVendreJson(Produit $produit, $id)
    {
        $produit = Produit::find($id);
        return json_encode($produit);
    }

    
    public function storeVente(Request $request)
    {
        $user = Auth::user()->id;
        $tab = $request->content;
        foreach($tab as $item){
            $vente = new Vente();
            $produit = Produit::where('name',$item['nom'])->first();
            $vente->produit_id     =  $produit->id;
            $vente->prixUnitaire   =  $item['pu'];
            $vente->nombre         =  $item['qt'];
            $vente->montant        =  $item['montant'];
            $vente->total          =  $item['total'];
            $vente->user_id        =  $user;
            $vente->livrer         =  "Client";
            $vente->nomLivreur     =  "Client";
            $vente->dateVente      =  date("Y-m-d");
            $vente->save();
        }
        return 1;
        // return redirect('/ventes')->with('messageAdd','Vente enrégistrée avec succès !!!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function showVente(Vente $vente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function editVente(Vente $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vente  $vente
     * @return \Illuminate\Http\Response 
     */
    public function updateVente(Request $request, Vente $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function destroyVente(Vente $vente)
    {
        //
    }
}
