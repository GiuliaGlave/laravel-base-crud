<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;

class PageController extends Controller
{
    public function tracksCard(){
        $tracks = Track::all();

        return view('tracks', compact('tracks'));
    }

    public function index(){

        return view('index');
    }
  
}