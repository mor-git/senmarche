<?php

namespace App\Http\Controllers;

use App\Pubs;
use Illuminate\Http\Request;

class ApiPubsController extends Controller
{
    public function showPubs(){
        $pubs = Pubs::latest()->where('statut', 1)->get();
        return json_encode($pubs);
    }
}
