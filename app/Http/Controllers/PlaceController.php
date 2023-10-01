<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Affiche la liste des ressources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return view('pages.place-management', compact('places'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle ressource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.place.create');
    }

    /**
     * Stocke une nouvelle ressource dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $place = Place::create($request->all());
        return redirect()->route('places.index');
    }

    /**
     * Affiche la ressource spécifiée.
     *
     * @param  Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        return view('pages.place.show', compact('place'));
    }

    /**
     * Affiche le formulaire d'édition de la ressource spécifiée.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::findOrFail($id);
        return view('pages.place.edit', compact('place'));
    }

    /**
     * Met à jour la ressource spécifiée dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        $place = Place::find($id);

        if (!$place) {
            return redirect()->route('places.index')->with('error', 'Place non trouvée.');
        }

        $place->nom = $request->input('nom');
        $place->adresse = $request->input('adresse');
        $place->save();

        return redirect()->route('places.index')->with('success', 'Place mise à jour avec succès.');
    }

    /**
     * Supprime la ressource spécifiée de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::find($id);
        $place->delete();
        return redirect()->route('places.index')->with('success', 'Place supprimée avec succès');
    }
}
