<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
// ----------------------------------------Categories Route----------------------------
Route::get('/categories',[
    'as'   => 'categories',
    'uses' => 'CategorieController@showCategorie'
]);
Route::get('/addCategorie',[
    'as'   => 'addCategorie',
    'uses' => 'CategorieController@createCategorie'
]);
Route::post('/storeCategorie',[
    'as'   => 'storeCategorie',
    'uses' => 'CategorieController@storeCategorie'
]);
Route::get('/edit_Categorie/{id}',[
    'as'   => 'edit_Categorie',
    'uses' => 'CategorieController@editCategorie'
]);
Route::post('/modif_Categorie/{id}',[
    'as'   => 'modif_Categorie',
    'uses' => 'CategorieController@updateCategorie'
]);
Route::get('/supp_Categorie/{id}',[ 
    'as'   => 'supp_Categorie',
    'uses' => 'CategorieController@destroyCategorie'
]);
// -------------------------------------Fin Categories Route----------------------------
// ----------------------------------------Produits Route-------------------------------
Route::get('/produits',[
    'as'   => 'produits',
    'uses' => 'ProduitController@showProduit'
]);
Route::get('/addProduit',[
    'as'   => 'addProduit',
    'uses' => 'ProduitController@createProduit'
]);
Route::post('/storeProduit',[
    'as'   => 'storeProduit',
    'uses' => 'ProduitController@storeProduit'
]);
Route::get('/edit_Produit/{id}',[
    'as'   => 'editerProduit',
    'uses' => 'ProduitController@editProduit'
]);
Route::post('/modif_Produit/{id}',[
    'as'   => 'modifier',
    'uses' => 'ProduitController@updateProduit'
]);
Route::get('/supp_Produit/{id}',[
    'as'   => 'supprimer',
    'uses' => 'ProduitController@destroyProduit'
]);
// -------------------------------------Fin Produits Route----------------------------
// ----------------------------------------Commandes Route----------------------------
Route::get('/commandes',[
    'as'   => 'commandes',
    'uses' => 'CommandeController@showCommande'
]);
Route::get('/edit_Commande/{id}',[
    'as'   => 'edit_Commande',
    'uses' => 'CommandeController@editCommande'
]);
Route::post('/modif_Commande/{id}',[
    'as'   => 'modif_Commande',
    'uses' => 'CommandeController@updateCommande'
]);
Route::get('/supp_Commande/{id}',[
    'as'   => 'supp_Commande',
    'uses' => 'CommandeController@destroyCommande'
]);
// -------------------------------------Fin Commandes Route----------------------------
// ----------------------------------------Profils Route-------------------------------
Route::get('/profils',[
    'as'   => 'profils',
    'uses' => 'ProfilController@showProfil'
]);
Route::get('/addProfil',[
    'as'   => 'addProfil',
    'uses' => 'ProfilController@createProfil'
]);
Route::post('/storeProfil',[
    'as'   => 'storeProfil',
    'uses' => 'ProfilController@storeProfil'
]);
Route::get('/edit_Profil/{id}',[
    'as'   => 'edit_Profil',
    'uses' => 'ProfilController@editProfil'
]);
Route::post('/modif_Profil/{id}',[
    'as'   => 'modif_Profil',
    'uses' => 'ProfilController@updateProfil'
]);
Route::get('/supp_Profil/{id}',[
    'as'   => 'supp_Profil',
    'uses' => 'ProfilController@destroyProfil'
]);
// -------------------------------------Fin Profils Route----------------------------
// ----------------------------------------Users Route----------------------------
// -------------------------------------Fin Users Route----------------------------
// ----------------------------------------Pubs Route----------------------------
Route::get('/pubs',[
    'as'   => 'pubs', 
    'uses' => 'PubsController@showPubs'
]);
Route::get('/pubsTotal',[
    'as'   => 'pubsTotal', 
    'uses' => 'PubsController@showTotalPubs'
]);
Route::get('/addPub',[
    'as'   => 'addPub',
    'uses' => 'PubsController@createPubs'
]);
Route::post('/storePub',[
    'as'   => 'storePub',
    'uses' => 'PubsController@storePubs'
]);
Route::get('/editPub/{id}',[
    'as'   => 'editPub',
    'uses' => 'PubsController@editPubs'
]);
Route::post('/modifierPub/{id}',[
    'as'   => 'modifierPub',
    'uses' => 'PubsController@updatePubs'
]);
Route::get('/destroyPub/{id}',[
    'as'   => 'destroyPub',
    'uses' => 'PubsController@destroyPub'
]);
// -------------------------------------Fin Pubs Route----------------------------

