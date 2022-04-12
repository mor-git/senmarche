<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProfil()
    {
        $profils = Profil::all();
        return view('profils.listProfil', ['profils'=> $profils]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProfil()
    {
        return view('profils.addProfil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProfil(Request $request)
    {
        $name = $request->input('name');

        $profil = new Profil();
        $profil->name = $name;
        // dd($profil);
        $profil->save();

        return view('profils.addProfil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function showProfil(Profil $profil)
    {
        $profils = Profil::all();
        return view('profils.listProfil', ['profils'=> $profils]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function editProfil(Profil $profil, $id)
    {
        $profil = Profil::find($id);
        return view('profils.editProfil', ['profil'=> $profil]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function updateProfil(Request $request, Profil $profil, $id)
    {
        $name = $request->input('name');
        $profil = Profil::find($id);
        
        $profil->name = $name;
        $profil->update();

        return redirect('/profils');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroyProfil(Profil $profil, $id)
    {
        $profil = Profil::find($id);
        dd($profil);
        $profil->delete();

        return redirect('/profils');
    }
}
