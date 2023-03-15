<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $categories = Categorie::all();

        switch(Auth::user()->categorieProfil) {

            case('1'):
                $categories = Categorie::all();
                return view('produits.addProduit',['categories'=>$categories]);
                break;

            case('2'):
                $categories = Categorie::where('id',1)->get();
                return view('produits.addProduit',['categories'=>$categories]);
                break;

            case('3'):
                $categories = Categorie::whereIn('id',[2,3])->get();
                return view('produits.addProduit',['categories'=>$categories]);
                break;

            case('4'):
                $categories = Categorie::where('id',4)->get();
                return view('produits.addProduit',['categories'=>$categories]);
                break;
            default:
                
        }
        // return view('produits.addProduit',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduit(Request $request)
    {
        $request->validate([ 
                'Nom' => 'required',
                'Prix' => 'required',
                'Catégorie' => 'required',
            ],
            [
                'required'  => ':attribute ne doit pas être vide.',
                // 'unique'    => ':attribute is already used'
            ]
        );

        $params = $request->except(['_token']);
    
        $produit = new Produit();
        if ($request->hasFile('image')) {

            // Save le fichier dans storage/public/ dans un nouveau dossier /images

            //-------------------------------New-----------------------------------
            $file = $request->file('image');
            $filename = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('assets/images/'),$filename);

            $produit->legende        = $filename;
            $produit->categorie_id   = $params['Catégorie'];
            $produit->name           = $params['Nom'];
            $produit->prix           = $params['Prix'];
            $produit->statut         = 0;
            // dd($produit);
            $produit->save();
        }

        return redirect('/showProduitCategorie')->with('messageAdd','Produit enrégistré avec succès !!!');
        
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

    public function showProduitCategorie(Produit $produit) 
    {
        $categProf = Auth::user()->categorieProfil;

        if($categProf === 1){   

            $produits = Produit::paginate(3);
            return view('produits.listProduit',['produits'=>$produits]);

        }elseif($categProf === 2){
            $produits = Produit::where('categorie_id',1)->paginate(3);
            return view('produits.listProduit',['produits'=>$produits]);

        }elseif($categProf === 3){
            $produits = Produit::whereIn('categorie_id',[2,3])->paginate(3);
            return view('produits.listProduit',['produits'=>$produits]);

        }elseif($categProf === 4){
            $produits = Produit::where('categorie_id',4)->paginate(3);
            return view('produits.listProduit',['produits'=>$produits]);

        }else{
            
            return redirect('/');
        }
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
        switch(Auth::user()->categorieProfil) {

            case('1'):
                $categories = Categorie::all();
                return view('produits.editProduit',compact('produit','categories'));
                break;

            case('2'):
                $categories = Categorie::where('id',1)->get();
                return view('produits.editProduit',compact('produit','categories'));
                break;

            case('3'):
                $categories = Categorie::whereIn('id',[2,3])->get();
                return view('produits.editProduit',compact('produit','categories'));
                break;

            case('4'):
                $categories = Categorie::where('id',4)->get();
                return view('produits.editProduit',compact('produit','categories'));
                break;
            default:
                
        }
        
    }

    // public function aVendreJson(Produit $produit, $id)
    // {
    //     $produit = Produit::find($id);
    //     return json_encode($produit);
    // }

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
        $produit->update();
        // dd($produit);

        return redirect('/showProduitCategorie')->with('messageUpdate','Produit modifié avec succès !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroyProduit(Request $request)
    {
        $produit = Produit::find($request->deleteProd);
        $file= $produit->legende;
        
        unlink(public_path() . '/assets/images/'.$file);
        $produit->delete();

        return redirect('/showProduitCategorie')->with('messageDelete','Produit supprimé avec succès !!!');
    }
}
