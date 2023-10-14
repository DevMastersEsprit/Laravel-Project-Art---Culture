<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Http\PlaceRequest;
class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return view('pages.place-management', compact('places'));
    }

    public function create()
    {
        return view('pages.place.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'capacity' => 'nullable|integer',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'facilities' => 'nullable|array',
            'accessibility' => 'nullable|string',
            'internal_rules' => 'nullable|string',
            'photos' => 'nullable|array',
            'website' => 'nullable|url',
            'phone_number' => 'nullable|regex:/^[0-9]{8}$/|numeric', // 10 chiffres
            'email' => 'nullable|email',
            'social_media_links' => 'nullable|array',
        ]);
$data=$request->all();
        $place = Place::create($data);
        return redirect()->route('places.index');
    }

    public function show(Place $place)
    {
        return view('pages.place.show', compact('place'));
    }

    public function edit($id)
    {
        $place = Place::findOrFail($id);
        return view('pages.place.edit', compact('place'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'capacity' => 'nullable|integer',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'facilities' => 'nullable|array',
            'accessibility' => 'nullable|string',
            'internal_rules' => 'nullable|string',
            'photos' => 'nullable|array',
            'website' => 'nullable|url',
            'phone_number' => 'nullable|regex:/^[0-9]{8}$/|numeric', // 10 chiffres
            'email' => 'nullable|email',
            'social_media_links' => 'nullable|array',
            'rental_cost' => 'nullable|regex:/^\d+(\.\d{1,2})?$/', // Nombre avec 2 décimales au maximum
        ]);
$data=$request->all();

        $place = Place::find($id);

        if (!$place) {
            return redirect()->route('places.index')->with('error', 'Lieu non trouvé.');
        }

        $place->update($data);

        return redirect()->route('places.index')->with('success', 'Lieu mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $place = Place::find($id);
        $place->delete();
        return redirect()->route('places.index')->with('success', 'Lieu supprimé avec succès.');
    }
}

