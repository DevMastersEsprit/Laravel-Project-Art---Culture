<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Evenement;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("article.create");
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
            'titre' => 'required|alpha',
            'contenu' => 'required',
            'description' => 'required'
        ], [
            'title.required' => 'Title is required',
            'contenu.required' => 'Contenu is required',
            'description.required' => 'Description is required',
        ]);
        $evenement = Evenement::find($request->eventId);
        if (!$evenement) {
            $article = new Article;
            $article->title = $request->title;
            $article->description = $request->description;
            $article->contenu = $request->contenu;
            $evenement->articles()->save($article);
        }
        return redirect()->route('events.index')
            ->with('success', 'Event has been created successfully.');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
