@extends('layouts.app')

@section('page-name', 'Brani')

@section('content')

<div class="container my-5">
    <h1>Brani musicali</h1>
    
    <div class="row row-cols-4 g-3">

        @foreach($tracks as $track)

        <div class="col mt-3">
            <div class="card" >
                <img src={{ $track->poster}} class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Titolo: {{ $track->title}}</h5>
                <h6 >Autore: {{ $track->author}}</h6>
                <h6 >Album: {{ $track->album}}</h6>  
                </div>              
            </div>
        </div>

        @endforeach
    </div>
</div>

@endsection