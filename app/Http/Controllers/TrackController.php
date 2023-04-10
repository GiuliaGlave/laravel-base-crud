<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index(Request $request){
        $tracks = Track::limit(20)->get();

        if($request->has('term')){
            $term = $request->get('term');
            $tracks = Track::where('title', 'LIKE', "%$term%")->paginate(20)->withQueryString();
        } else {
            $tracks = Track::paginate(20);
        }
        
        return view('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('tracks.create');
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
            'title' => 'required',
            'author' => 'required',
        ]);
        
        $data = $request->all();

      /*   $track = new Track;           
        $track->title = $data["title"];
        $track->album = $data["album"];
        $track->author = $data["author"];
        $track->editor = $data["editor"];
        $track->length = $data["length"];
        $track->poster = $data["poster"];
        $track->save(); */
        $track = new Track;  

         $track->fill($data);

        $track->save();
        
        return redirect()->route('tracks.show', $track); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
       return view('tracks.show', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'album' => 'nullable|string|max:50',
            'author' => 'required|string|max:50',
            'editor' => 'nullable|string|max:50',
            'length' => 'nullable|date_format:i:s',
            'poster' => 'nullable|string'
        ], [
            'title.required' => 'Inserire il titolo',
            'title.string' => 'Il titolo deve essere una stringa',
            'title.max' => 'Il titolo può avere al massimo 50 caratteri',

            'album.string' => 'L\' album deve essere una stringa',
            'album.max' => 'L\' album può avere al massimo 50 caratteri',

            'author.required' => 'Inserire l\'autore',
            'author.string' => 'L\' autore deve essere una stringa',
            'author.max' => 'L\' autore può avere al massimo 50 caratteri',

            'editor.string' => 'L\' editore deve essere una stringa',
            'editor.max' => 'L\' editore può avere al massimo 50 caratteri',

            'length.date_format' => 'Il formato della durata deve essere di tipo time (00:00)',

            'poster.string' => 'L\' immagine di copertina deve essere una stringa'
        ]);


        $data = $request->all();

        $track->update($data);

        

        return redirect()->route('tracks.show', ['track' => $track->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
         $track->delete();
        return redirect()->route('tracks.index');
    }
}