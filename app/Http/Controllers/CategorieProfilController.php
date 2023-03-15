<?php

namespace App\Http\Controllers;

use App\CategorieProfil;

use Illuminate\Http\Request;

class CategorieProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCategorieProf()
    {
        $categProfils = CategorieProfil::all();
        return view('categorieProfil.listCategorieProfil', ['profils'=> $categProfils]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategorieProf()
    {
        return view('categorieProfil.addCategorieProfil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategorieProf(Request $request)
    {
        $request->validate([ 
            'nom' => 'required',
        ],
        [
            'required'  => 'Le :attribute ne doit pas être vide.',
        ]
    );
    $name = $request->input('nom');

    $profilGestionnaire = new CategorieProfil();
    $profilGestionnaire->name = $name;
    $profilGestionnaire->save();

    return redirect('categorie_profil')->with('messageAdd','Profil enrégistré avec succès !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategorieProfil  $categorie_Profil
     * @return \Illuminate\Http\Response
     */
    public function showCategorieProf(Categorie_Profil $categorie_Profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategorieProfil  $categorieProfil
     * @return \Illuminate\Http\Response
     */
    public function editCategorieProf(CategorieProfil $categorie_Profil,$id)
    {
        $categorie_Profil = CategorieProfil::find($id);
        // dd($categorie_Profil);
        return view('categorieProfil.editCategorieProfil',['categorieProfil' => $categorie_Profil]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategorieProfil  $categorie_Profil
     * @return \Illuminate\Http\Response
     */
    public function updateCategorieProf(Request $request, CategorieProfil $categorie_Profil, $id)
    {
        $categorie_Profil = CategorieProfil::find($id);
        $name = $request->input('name');

        $categorie_Profil->name = $name;
        $categorie_Profil->update();

        return redirect('/categorie_profil')->with('messageUpdate','Catégorie Profil modifiée avec succès !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie_Profil  $categorie_Profil
     * @return \Illuminate\Http\Response
     */
    public function destroyCategorieProf(Categorie_Profil $categorie_Profil)
    {
        //
    }
}
