<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Domain;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = Domain::all();
        $actorsByDomain = Domain::with('actors')->orderBy('name')->get();

        return view ('pages.DomainManagement.index', compact('domains'), compact('actorsByDomain')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.DomainManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $domain = new Domain([
            "name" => $request->get('name'),
            "description" => $request->get('description')
        ]);

        $request->validate([
            'name' => 'required|max:20',
            'description' => 'required'
        ]);

        $domain->save();

        return redirect()->route('domain-management.index')->with('success', 'Domain is added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domain = Domain::find($id);

        if (!$domain) {
            return redirect()->route('domain-management.index')->with('error', 'Domain not found !');
        }
        return view('pages.DomainManagement.domain', compact('domain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $domain = Domain::find($id);

        if (!$domain) {
            return redirect()->route('domain-management.index')->with('error', 'Domain not found !');
        }

        return view('pages.DomainManagement.edit', compact('domain'), compact('domain'));
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
        if ($id) {
            $domain = Domain::find($id);

            $request->validate([
                'name' => 'required|max:20',
                'description' => 'required'
            ]);
            
            $domain->name = $request->name;
            $domain->description = $request->description;
            $domain->save();

            return redirect()->route('domain-management.index')->with('success', 'Domain is updated successfully !');
            
        } else {
            return redirect()->route('domain-management.index')->with('error', 'Domain not found !');
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
        $domain = Domain::find($id);
        if (!$domain) {
            return redirect()->route('domain-management.index')->with('error', 'Domain not found !');
        }
        $domain->delete();
        return redirect()->route('domain-management.index')->with('success', 'Domain is deleted with success !');
    }
}
