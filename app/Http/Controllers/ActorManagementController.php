<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Actor;

class ActorManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actor::all();
        return view ('pages.ActorManagement.index', compact('actors')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ActorManagement.create');
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
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->profilePicture->extension();

        $request->profilePicture->move(public_path('actorPictures'), $imageName);
        
        $actor = new Actor([
            "fullName" => $request->get('fullName'),
            "birthDate" => $request->get('birthDate'),
            "birthPlace" => $request->get('birthPlace'),
            "biography" => $request->get('biography'),
            "nationality" => $request->get('nationality'),
            "specialties" => $request->get('specialties'),
            "profilePicture" => $imageName,
            "email" => $request->get('email'),
            "phoneNumber" => $request->get('phoneNumber'),
            "socialConnections" => $request->get('socialConnections'),
            "discography" => $request->get('discography'),
            "availability" => $request->get('availability'),
        ]);

        $actor->save();
        return redirect()->route('actor-management.index')->with('success', 'Actor is added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->query('id');
        $actor = Actor::find($id);
        return view('pages.ActorManagement.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->query('id');
        if ($id) {
            $actor = Actor::find($id);
            $request->validate([
                'fullName' => 'required',
                'email' => 'required',
                'phoneNumber' => 'required',
                // 'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->profilePicture) {

                if (is_string($request->profilePicture)) {
                    $fileHandle = fopen($request->profilePicture, 'w');
                    fwrite($fileHandle, $request->profilePicture);
                    fclose($fileHandle);

                    $imageName = time().'.'.$fileHandle->extension();

                    $fileHandle->move(public_path('actorPictures'), $imageName);
                    
                    $actor->fullName = $request->fullName;
                    $actor->birthDate = $request->birthDate;
                    $actor->birthPlace = $request->birthPlace;
                    $actor->biography = $request->biography;
                    $actor->nationality = $request->nationality;
                    $actor->specialties = $request->specialties;
                    $actor->profilePicture = $imageName;
                    $actor->email = $request->email;
                    $actor->phoneNumber = $request->phoneNumber;
                    $actor->socialConnections = $request->socialConnections;
                    $actor->discography = $request->discography;
                    $actor->availability = $request->availability;
                    $actor->save();

                    return redirect()->route('actor-management.index')->with('success', 'Actor is updated successfully !');
                } else {
                    $imageName = time().'.'.$request->profilePicture->extension();

                    $request->profilePicture->move(public_path('actorPictures'), $imageName);
                    
                    $actor->fullName = $request->fullName;
                    $actor->birthDate = $request->birthDate;
                    $actor->birthPlace = $request->birthPlace;
                    $actor->biography = $request->biography;
                    $actor->nationality = $request->nationality;
                    $actor->specialties = $request->specialties;
                    $actor->profilePicture = $imageName;
                    $actor->email = $request->email;
                    $actor->phoneNumber = $request->phoneNumber;
                    $actor->socialConnections = $request->socialConnections;
                    $actor->discography = $request->discography;
                    $actor->availability = $request->availability;
                    $actor->save();

                    return redirect()->route('actor-management.index')->with('success', 'Actor is updated successfully !');
                }
                
                

                
            } else {
                $actor->fullName = $request->fullName;
                $actor->birthDate = $request->birthDate;
                $actor->birthPlace = $request->birthPlace;
                $actor->biography = $request->biography;
                $actor->nationality = $request->nationality;
                $actor->specialties = $request->specialties;
                $actor->profilePicture = $request->profilePicture;
                $actor->email = $request->email;
                $actor->phoneNumber = $request->phoneNumber;
                $actor->socialConnections = $request->socialConnections;
                $actor->discography = $request->discography;
                $actor->availability = $request->availability;
                $actor->save();

                return redirect()->route('actor-management.index')->with('success', 'Actor is updated successfully !');
            }
            
        } else {
            return redirect()->route('actor-management.index')->with('error', 'Actor not found !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actor = Actor::find($id);
        if (!$actor) {
            return redirect()->route('actor-management.index')->with('error', 'Actor not found !');
        }
        $actor->delete();
        return redirect()->route('actor-management.index')->with('success', 'Actor is deleted with success !');
    }
}
