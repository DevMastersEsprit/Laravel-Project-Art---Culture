<?php

namespace App\Http\Controllers;

use App\Models\Emoji;
use Illuminate\Http\Request;


class EmojiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emojis = Emoji::all();
        return view('Emoji.index', compact('emojis'));
    
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
        $emjValue = $request->emj;
        $emojis = Emoji::all();
        $exists = false;

        $request->validate([
            'emj' => ['required','string','valid_emoji','min:1','max:5']
            //,'regex:/^[^!@#$%^&*()_+={}\[\]|\\:;<>,".\/`~-]+$/'
            
        ]);

        foreach ($emojis as $emoji) {
            if ($emoji->emj === $emjValue) {
                $exists = true;
                break; 
            }
        }

        if ($exists) {
            return redirect()->route('emoji.index')
            ->withErrors(['emj' => 'The emj has already been taken.'])
            ->withInput();
        } else {
            $emoji = new Emoji;

            $emoji->emj = $request->emj;
            $emoji->save();

            return redirect()->route('emoji.index')
                            ->with('success','Emoji added successfully.');
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
        $emoji = Emoji::find($id) ;
        $emoji->delete() ;
        return redirect()->route('emoji.index')
            ->with('success','Emoji deleted successfully') ;
    }
}
