<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Emoji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $commentaires = Commentaire::with('emojis', 'user')->get();
            $emojis = Emoji::all();
            return view('Commentaire.index', compact('commentaires', 'emojis'));
        } else {
            return redirect()->back();
        }
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
        if (auth()->user()->role === 'admin') {
            $request->validate([
                'Content' => 'required|string|max:190'
            ]);

            $commentaire = new Commentaire;

            $commentaire->Content = $request->Content;
            $commentaire->Likes = 0;
            $commentaire->Dislikes = 0;
            $commentaire->ReplyTo = "Nothing";
            $commentaire->user_id = auth()->user()->id;
            $commentaire->save();


            return redirect()->route('comment.index')
                ->with('success', 'Comment added successfully.');
        } else {
            return redirect()->back();
        }
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
        if (auth()->user()->role === 'admin') {
            $commentaire = Commentaire::with('emojis', 'user')->find($id);
            return view('commentaire.edit', compact('commentaire'));
        } else {
            return redirect()->back();
        }
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
        if (auth()->user()->role === 'admin') {
            $request->validate([
                'Content' => 'required|string|max:190'
            ]);

            $commentaire = Commentaire::find($id);

            $commentaire->Content = $request->Content;
            $commentaire->Likes = 0;
            $commentaire->Dislikes = 0;
            $commentaire->emojis()->detach();

            $commentaire->save();


            return redirect()->route('comment.index')
                ->with('success', 'Comment edited successfully.');
        } else {
            return redirect()->back();
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
        if (auth()->user()->role === 'admin') {
            $commentaire = Commentaire::find($id);
            $commentaire->delete();
            return redirect()->route('comment.index')
                ->with('success', 'Comment deleted successfully');
        } else {
            return redirect()->back();
        }
    }
    public function like($id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->Likes = $commentaire->Likes + 1;
        $commentaire->save();
        return redirect()->route('comment.index');

    }
    public function dislike($id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->Dislikes = $commentaire->Dislikes + 1;
        $commentaire->save();
        return redirect()->route('comment.index');

    }

    public function addEmoji(Request $request)
    {
        if (auth()->user()->role === 'admin') {
            $commentId = $request->input('commentId');
            $emojiEmj = $request->input('emojiEmj');



            if ($emojiEmj == null) {
                return redirect()->route('comment.index')
                    ->with('errorEmj', 'Choose Emj');
            } else {
                $commentaire = Commentaire::find($commentId);

                $selectedEmojis = null;
                $emojis = Emoji::all();
                foreach ($emojis as $emoji) {
                    if ($emoji->emj == $emojiEmj) {
                        $selectedEmojis = $emoji;
                    }
                }
                if ($selectedEmojis == null) {
                    return redirect()->route('comment.index')
                        ->with('errorEmj', 'Choose Emj from list');
                } else {
                    //$commentaire->emojis()->sync([$selectedEmojis->id => ['user_id' => auth()->user()->id]],false);
                    DB::table('commentaire_emoji')->updateOrInsert(
                        [
                            'commentaire_id' => $commentId,
                            'user_id' => auth()->user()->id,
                        ],
                        [
                            'emoji_id' => $selectedEmojis->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
                    return redirect()->route('comment.index');
                }
            }
        } else {
            return redirect()->back();
        }
    }

    public function removeEmoji(Request $request)
    {
        if (auth()->user()->role === 'admin') {
            $cId = $request->input('cId');
            $commentaire = Commentaire::find($cId);
            $commentaire->emojis()
                ->wherePivot('user_id', auth()->user()->id)
                ->detach();

            return redirect()->route('comment.index');
        } else {
            return redirect()->back();
        }
    }
    public function replay(Request $request)
    {
        if (auth()->user()->role === 'admin') {
            $request->validate([
                'ContentReplay' => 'required|string|max:190'
            ]);

            $commentaire = new Commentaire;

            $commentaire->Content = $request->ContentReplay;
            $commentaire->Likes = 0;
            $commentaire->Dislikes = 0;
            $commentaire->ReplyTo = "Comment";
            $commentaire->parent_comment_id = $request->rcId;
            $commentaire->user_id = auth()->user()->id;
            $commentaire->save();


            return redirect()->route('comment.index')
                ->with('success', 'Comment added successfully.');
        } else {
            return redirect()->back();
        }
    }

}
