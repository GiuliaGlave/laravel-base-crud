@extends('layouts.app')

@section('page-name')
Brani
@endsection

@section('content')

<h1>Brani musicali</h1>
<div class="container">
    <div class="row">
        @foreach($tracks as $track)
        <div class="col
        ">
            <div class="card" style="width: 18rem;">
                <img src={{ $track->poster}} class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Titolo: {{ $track->title}}</h5>
                <h5 class="card-title">Autore: {{ $track->author}}</h5>
                <h5 class="card-title">Album: {{ $track->album}}</h5>                
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection