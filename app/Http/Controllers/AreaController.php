<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Place;
class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        $places = Place::all(); // Retrieve all places from the database

        return view('pages.area-management', compact('areas', 'places')); // Send both areas and places to the view
    }


    public function create()
    {
        return view('areas.create'); // Display the create area form
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'nullable|integer',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'rental_cost' => 'nullable|numeric',
            'availability' => 'nullable|boolean',
            'places_id'=>'required'
        ]);

        $data = $request->all();

        $room = Area::find($id);

        if (!$room) {
            return redirect()->route('areas.index')->with('error', ' not found.');
        }

        $room->update($data);

        return redirect()->route('areas.index')->with('success', 'Area updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'capacity' => 'required|integer',
            'description' => 'nullable',
            'address' => 'required',

            'postal_code' => 'required|integer',
            'rental_cost' => 'required|numeric',
            'availability' => 'boolean',
            'place_id' => 'nullable',


        ]);

        $data=$request->all();
        $place = Area::create($data);
        return redirect()->route('areas.index');
    }




    public function destroy($id)
    {
        $area = Area::find($id);

        if (!$area) {
            return redirect()->route('areas.index')->with('error', 'Area not found.');
        }

        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Area deleted successfully');
    }


}


