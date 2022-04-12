<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/apiProduitsLegume',[
    'as'         => 'apiProduitsLegume', 
    'uses'       => 'ApiProduitController@showProduitLegume',
    'middleware' => 'cors'
]);
Route::get('/apiOneLegume/{id}',[
    'as'         => 'apiOneLegume', 
    'uses'       => 'ApiProduitController@showOneLegume',
    'middleware' => 'cors'
]);
Route::get('/apiProduitsViande',[
    'as'         => 'apiProduitsViande', 
    'uses'       => 'ApiProduitController@showProduitViande',
    'middleware' => 'cors'
]);
Route::get('/apiProduitsPoulet',[
    'as'         => 'apiProduitsPoulet', 
    'uses'       => 'ApiProduitController@showProduitPoulet',
    'middleware' => 'cors'
]);
Route::post('/apiCommande',[
    'as'         => 'apiCommande',  
    'uses'       => 'ApiCommandeController@storeCommande',
    'middleware' => 'cors'
]);
