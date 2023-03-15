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
    return view('users.loginPage');
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
Route::get('/showProduitCategorie','ProduitController@showProduitCategorie')->name('showProduitCategorie');
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
Route::post('/supp_Produit',[
    'as'   => 'supprimer',
    'uses' => 'ProduitController@destroyProduit'
]);
// -------------------------------------Fin Produits Route----------------------------
// ----------------------------------------Commandes Route----------------------------
Route::get('/recherches','CommandeController@recherche')->name('recherches');
Route::get('/commandes',[
    'as'   => 'commandes',
    'uses' => 'CommandeController@showCommande'
]);
Route::get('/detail_commande/{id}','CommandeController@indexCommande')->name('detail_commande');
Route::get('/edit_Commande/{id}',[
    'as'   => 'edit_Commande',
    'uses' => 'CommandeController@editCommande'
]);
Route::post('/modif_Commande/{id}',[
    'as'   => 'modif_Commande',
    'uses' => 'CommandeController@updateCommande'
]);
Route::post('/supp_Commande',[
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
// ----------------------------------------Ventes Route-------------------------------
Route::get('/ventes','VenteController@indexVente')->name('ventes');
Route::get('/detailsVente','VenteController@detailVente')->name('detailsVente');
Route::get('/vente_Entre_Date','VenteController@selectVente')->name('vente_Entre_Date');
Route::get('/addVente','VenteController@createVente')->name('addVente');
Route::post('/storeVente','VenteController@storeVente')->name('storeVente');
Route::get('/editVente/{id}','VenteController@editVente')->name('editVente');
Route::post('/modifVente/{id}','VenteController@updateVente')->name('modifVente');
Route::get('/suppVente/{id}','VenteController@destroyVente')->name('suppVente');
Route::get('/avendre/{id}','VenteController@aVendreJson')->name('avendre');
// -------------------------------------Fin Ventes Route------------------------------
// -------------------------------Categorie Profils Route----------------------------
Route::get('/categorie_profil','CategorieProfilController@indexCategorieProf')->name('categorie_profil');
Route::get('/addCategorie_profil','CategorieProfilController@createCategorieProf')->name('addCategorie_profil');
Route::post('/storeCategorie_profil','CategorieProfilController@storeCategorieProf')->name('storeCategorie_profil');
Route::get('/editCategorie_profil/{id}','CategorieProfilController@editCategorieProf')->name('editCategorie_profil');
Route::post('/modifCategorie_profil/{id}','CategorieProfilController@updateCategorieProf')->name('modifCategorie_profil');
Route::get('/suppCategorie_profil/{id}','CategorieProfilController@destroyCategorieProf')->name('suppCategorie_profil');
// ---------------------Fin Categorie Profils Route----------------------------------
// ----------------------------------------Users Route-------------------------------
Route::get('/users','UserController@indexUser')->name('users');
Route::get('/addUser','UserController@createUser')->name('addUser');
Route::post('/storeUser','UserController@storeUser')->name('storeUser');
Route::get('/edit_user/{id}','UserController@editUser')->name('edit_user');
Route::post('/modif_user/{id}','UserController@updateUser')->name('modif_user');
Route::get('/supp_user/{id}','UserController@destroyUser')->name('supp_user');
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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
