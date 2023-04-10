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