<?php

namespace App\Http\Controllers;


use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return view ('pages.place.index', compact('places')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.place.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $place = Place::create($request->all());

        /*$place = new Place([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "price" => $request->get('price'),
            "stock" => $request->get('stock'),
        ]);*/


        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Place $place)
    {
        //$place = place::find($id) ;
        return view('pages.place.show', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    // Récupérer la place à éditer en utilisant l'ID
    $place = Place::findOrFail($id);

    // Passer la place à la vue "edit.blade.php" pour l'affichage du formulaire
    return view('pages.place.edit', compact('place'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Valider les données du formulaire
    $request->validate([
        'nom' => 'required|string|max:255', // Vous pouvez ajuster les règles de validation selon vos besoins
        'adresse' => 'required|string|max:255', // Vous pouvez ajuster les règles de validation selon vos besoins
    ]);

    // Trouver la place à mettre à jour
    $place = Place::find($id);

    if (!$place) {
        return redirect()->route('places.index')->with('error', 'Place non trouvée.');
    }

    // Mettre à jour les propriétés de la place avec les nouvelles valeurs
    $place->nom = $request->input('nom');
    $place->adresse = $request->input('adresse');

    // Enregistrer les modifications dans la base de données
    $place->save();

    return redirect()->route('places.index')->with('success', 'Place mise à jour avec succès.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::find($id);
        $place->delete();
        return redirect()->route('places.index')
            ->with('success', 'Place supprimée avec succès');
    }

}
