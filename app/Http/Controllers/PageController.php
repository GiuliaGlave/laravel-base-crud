<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;

class PageController extends Controller
{
    public function tracks(){
        $track = Track::all();

        return view('track', compact('track'));
    }
}