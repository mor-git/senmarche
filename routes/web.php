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
Route::get('/editer/{id}',[
    'as'   => 'editer',
    'uses' => 'CategorieController@editCategorie'
]);
Route::post('/modifier/{id}',[
    'as'   => 'modifier',
    'uses' => 'CategorieController@updateCategorie'
]);
Route::get('/supprimer/{id}',[
    'as'   => 'supprimer',
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
Route::get('/editer/{id}',[
    'as'   => 'editer',
    'uses' => 'ProfilController@editProfil'
]);
Route::post('/modifier/{id}',[
    'as'   => 'modifier',
    'uses' => 'ProfilController@updateProfil'
]);
Route::get('/supprimer/{id}',[
    'as'   => 'supprimer',
    'uses' => 'ProfilController@destroyProfil'
]);
// -------------------------------------Fin Profils Route----------------------------
// ----------------------------------------Users Route----------------------------
// -------------------------------------Fin Users Route----------------------------
