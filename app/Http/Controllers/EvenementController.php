<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evenements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email',
            'address' => 'required'
        ],[
            'name.required'=> 'Please entre your name.',
            'name.alpha'=> 'Name must contains only chars',
            'email.required'=> 'Email is required'
        ]);
 
        $evenement = new Evenement;
 
        $evenement->nom = $request->nom;
        $evenement->date_debut = $request->dateDebut;
        $evenement->date_fin = $request->dateFin;
        $evenement->description = $request->description;
        $evenement->save();

      
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
        return view('events.show',compact('company'));
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
