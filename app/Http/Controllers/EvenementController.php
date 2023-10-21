<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Evenement;
use App\Models\Place;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['evenements'] = Evenement::paginate(5);
        return view('evenements.index', $data);
    }

    public function indexFront()
    {
        $data['evenements'] = Evenement::with('place')->get();
        return view('evenements.front-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['actors'] = Actor::all();
        $data['places'] = Place::all();
        return view('evenements.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nom' => 'required|alpha',
        //     'email' => 'required|email',
        //     'address' => 'required'
        // ]);
        // dd($request->image);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('eventImages'), $imageName);
 
        $evenement = new Evenement;
        
        $evenement->nom = $request->nom;
        $evenement->image = $request->imageName;
        $evenement->date_debut = $request->dateDebut;
        $evenement->date_fin = $request->dateFin;
        $evenement->description = $request->description;
        $evenement->places_id = $request->place_id;
        $evenement->save();

        $evenement->actors()->attach($request->input('actors'));

        return redirect()->route('events.index')
                        ->with('success','Event has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evenement = Evenement::with('articles')->find($id);
        return view('evenements.show',compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evenement = Evenement::find($id);
        return view('evenements.edit',compact('evenement'));
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
        $evenement = Evenement::find($id);
        if (!is_string($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('eventImages'), $imageName);
            $evenement->image = $imageName;
        }
        $evenement->nom = $request->nom;
        $evenement->date_debut = $request->dateDebut;
        $evenement->date_fin = $request->dateFin;
        $evenement->description = $request->description;

        $evenement->save();
     
        return redirect()->route('events.index')
                        ->with('success','Event Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evenement = Evenement::where('id', $id)->firstOrFail();
        $evenement->delete();
        return redirect()->route('events.index')
                        ->with('success','Event has been deleted successfully');
    }
}
