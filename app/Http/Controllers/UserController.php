<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Profil;
use App\CategorieProfil;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        $users = User::paginate(5);
        return view('users.listUser',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser()
    {
        $profils = Profil::all();
        $categProfils = CategorieProfil::all();
        return view('users.addUser',['profils'=>$profils , 'categProfils'=>$categProfils]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'profil' => ['required'],
            'categProfils' => ['required']
            ],
            [
                'required'  => ':attribute ne doit pas être vide.'
            ]
        );
        $param = $request->except(['_token']);
        $user = new User();
        $user->name = $param['nom'];
        $user->phone = $param['phone'];
        $user->adresse = $param['adresse'];
        $user->email = $param['email'];
        $user->profil_id = $param['profil'];
        $user->categorieProfil = $param['categProfils'];
        $user->password = Hash::make($param['password']);
        // dd($user);
        $user->save();

        return redirect('/users')->with('messageAdd','Utilisateur Créé avec succès !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        $user = User::find($id);
        $profil = Profil::all();
        return view('users.editUser',['user'=> $user, 'profils'=>$profil]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $param = $request->except(['_token']);

        $user->name = $param['nom'];
        $user->phone = $param['phone'];
        $user->adresse = $param['adresse'];
        $user->email = $param['email'];
        $user->profil_id = $param['profil'];
        // dd($user);
        $user->update();
         return redirect('/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('messageDelete','Utilisateur supprimé avec succès !!!');
    }
}
