<?php

namespace App\Http\Controllers;

use App\Pubs;
use Illuminate\Http\Request;
use IlluminateSupportCarbon;

class PubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPubs()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPubs()
    {
        return view('pubs.addPub');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePubs(Request $request)
    {
        $request->validate([ 
                'Nom' => 'required',
            ],
            [
                'required'  => 'Le :attribute ne doit pas être vide.',
            ]
        );
        $param = $request->except(['_token']);
        $pub = new Pubs();
        $now = now();
        if($request->hasFile('image')) {

            $file = $request->file('image');
            $filename = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('assets/images/'),$filename);

            $pub->chemin  = $filename;
            $pub->libele  = $param['Nom'];
            $pub->datePub = $now;
            $pub->statut  = 1 ;
            // dd($pub);
            $pub->save();
        }
        return redirect('/pubs')->with('messageAdd','Pub enrégistrée avec succès !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pubs  $pubs
     * @return \Illuminate\Http\Response
     */
    public function showPubs(Pubs $pubs)
    {
        $pubs = Pubs::latest()->where('statut', 1)->get();
        return view('pubs.showPub',['pubs'=> $pubs ]);
    }

    public function showTotalPubs(Pubs $pubs)
    {
        $pubs = Pubs::latest()->get();
        return view('pubs.showPub',['pubs'=> $pubs ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pubs  $pubs
     * @return \Illuminate\Http\Response
     */
    public function editPubs(Pubs $pubs, $id)
    {
        $pub = Pubs::find($id);
        return view('pubs.editPub',['pub'=>$pub]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pubs  $pubs
     * @return \Illuminate\Http\Response
     */
    public function updatePubs(Request $request, Pubs $pubs, $id)
    {
        $param = $request->request->all();
        $pub = Pubs::find($id);
        $now = now();

        $pub->chemin  = $param['image'];
        $pub->libele  = $param['libele'];
        $pub->datePub = $now;
        $pub->statut  = $param['statut'];
        // dd($pub);
        $pub->update();
        
        return redirect('/pubs')->with('messageUpdate','Pub modifiée avec succès !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pubs  $pubs
     * @return \Illuminate\Http\Response
     */
    public function destroyPub(Pubs $pubs, $id)
    {
        $pub = Pubs::find($id);
        $file= $pub->chemin;
        unlink(public_path() . '/assets/images/'.$file);
        $pub->delete();

        return redirect('/pubs')->with('messageDelete','Pub supprimée avec succès !!!');
    }
}
