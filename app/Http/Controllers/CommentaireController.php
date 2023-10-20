<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Emoji;
use Illuminate\Http\Request;
use Mockery\Undefined;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaires = Commentaire::with('emojis')->get();
        $emojis = Emoji::all();

        return view('Commentaire.index', compact('commentaires','emojis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'Content' => 'required|string|max:190'
        ]);

        $commentaire = new Commentaire;

        $commentaire->Content = $request->Content;
        $commentaire->Likes = 0;
        $commentaire->Dislikes = 0;
        $commentaire->ReplyTo = "Noting";
        $commentaire->save();


        return redirect()->route('comment.index')
                        ->with('success','Comment added successfully.');
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
        $commentaire = Commentaire::find($id);
        $emojis = $commentaire->emojis;
        
        // foreach ($commentaires as $c) {
        //     if($c->id == $commentaire->id){
        //         foreach ($c->emojis as $emoji) {  
        //             $c->emojis()->detach($emoji);
        //         }
        //     }
            
        // }
        // ::with('emojis')->get();
        // dd($commentaire);
        return view('commentaire.edit',compact('commentaire','emojis'));
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
        $request->validate([
            'Content' => 'required|string|max:190'
        ]);

        $commentaire = Commentaire::find($id);
        
        // $commentaires = Commentaire::with('emojis')->get();
        

        $commentaire->Content = $request->Content;
        $commentaire->Likes = 0;
        $commentaire->Dislikes = 0;
        $commentaire->ReplyTo = "Noting";
        $commentaire->emojis()->detach();

        $commentaire->save();


        return redirect()->route('comment.index')
                        ->with('success','Comment edited successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commentaire = Commentaire::find($id) ;
        $commentaire->delete() ;
        return redirect()->route('comment.index')
            ->with('success','Comment deleted successfully') ;
    }
    public function like($id)
    {
        $commentaire = Commentaire::find($id) ;
        $commentaire->Likes = $commentaire->Likes+1; 
        $commentaire->save();
        redirect()->route('comment.index');
    
    }
    public function dislike($id)
    {
        $commentaire = Commentaire::find($id) ;
        $commentaire->Dislikes = $commentaire->Dislikes+1; 
        $commentaire->save();
        return redirect()->route('comment.index');
    
    }
    
    public function addEmoji(Request $request)
    {
        
        $commentId = $request->input('commentId');
        $emojiEmj = $request->input('emojiEmj');
        if($emojiEmj == null){
            return redirect()->route('comment.index')
            ->with('errorEmj','Choose Emj') ;
        }else{
            $commentaire = Commentaire::find($commentId) ;
        
            $emojis = Emoji::all();
            foreach ($emojis as $emoji) {
                if ($emoji->emj == $emojiEmj) {
                    $selectedEmojis = $emoji;
                }
            }
            $commentaire->emojis()->attach($selectedEmojis);
    
            return redirect()->route('comment.index');
        }
        
    }

    public function removeEmoji(Request $request)
    {
        //$commentaire->emojis()->detach($emoji);
        return redirect()->route('comment.index');
    }
}
