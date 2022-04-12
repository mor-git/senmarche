<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCategorie()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategorie()
    {
        return view('categories.addCategorie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategorie(Request $request)
    {
        $name = $request->input('name');

        $categorie = new Categorie();
        $categorie->name = $name;
        // dd($categorie);
        $categorie->save();

        return view('categories.addCategorie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function showCategorie(Categorie $categorie)
    {
        $categories = Categorie::all();
        return view('categories.listCategorie', ['categories'=> $categories] ); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function editCategorie(Categorie $categorie,$id)
    {
        $categorie = Categorie::find($id);
        return view('categories.editCategorie',['categorie' => $categorie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function updateCategorie(Request $request, Categorie $categorie, $id)
    {
        $categorie = Categorie::find($id);
        $name = $request->input('name');

        $categorie->name = $name;
        $categorie->update();

        return redirect('/categories'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroyCategorie(Categorie $categorie, $id)
    {
        $categorie = Categorie::find($id);
        dd($categorie);
        $categorie->delete();
        return redirect('/categories');
    }
}
