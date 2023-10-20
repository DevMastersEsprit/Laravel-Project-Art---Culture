<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Actor;
use \App\Models\Domain;

class ArtistInformation extends Controller
{
    public function index()
    {
        $actors = Actor::with('domains')->get();
        return view ('pages.FrontOffice.artistsInfo', compact('actors')) ;
    }
}
