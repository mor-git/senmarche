<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProduit()
    {
        $produits = Produit::all();
        return view('produits.listProduit',['produits'=>$produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProduit()
    {
        $categories = Categorie::all();
        return view('produits.addProduit',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduit(Request $request)
    {
        $params = $request->except(['_token']);

        $produit = new Produit();
        if ($request->hasFile('image')) {

            // Save le fichier dans storage/public/ dans un nouveau dossier /images

            //-------------------------------New-----------------------------------
            $file = $request->file('image');
            $filename = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('assets/images/'),$filename);

            $produit->legende        = $filename;
            $produit->categorie_id   = $params['categorie'];
            $produit->name           = $params['name'];
            $produit->prix           = $params['prix'];
            $produit->statut         = 0;
            // dd($produit);
            $produit->save();
        }

        return redirect('/produits');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function showProduit(Produit $produit) 
    {
        $produits = Produit::paginate(4);
        return view('produits.listProduit',['produits'=>$produits]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function editProduit(Produit $produit, $id)
    {
        $produit = Produit::find($id);
        $categories = Categorie::all();
        return view('produits.editProduit',compact('produit','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function updateProduit(Request $request, Produit $produit, $id)
    {
        $tabs = $request->request->all();
        
        $produit = Produit::find($id);
        $produit->name = $tabs['name'];
        $produit->prix = $tabs['prix'];
        $produit->categorie_id = $tabs['categorie'];
        $produit->statut = $tabs['statut'];

        dd($produit);

        return redirect('/produits');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroyProduit(Produit $produit, $id)
    {
        $produit = Produit::find($id);
        $produit->delete();

        return redirect('/produits');
    }
}
