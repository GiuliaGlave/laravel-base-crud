@extends('layouts.app')

@section('page-name', 'Dettaglio brano')

@section('content')

<div class="container d-flex justify-content-center">

<div class="card my-5 " style="width: 25rem;">
    <img src="{{$track->poster}}" class="card-img-top" alt="album poster">   
    <div class="card-header">
        <strong>Titolo:</strong>  {{$track->title}}
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Album:</strong> {{$track->album}}</li>
        <li class="list-group-item"><strong>Autore:</strong> {{$track->author}}</li>
        <li class="list-group-item"><strong>Produttore:</strong> {{$track->editor}}</li>
        <li class="list-group-item"><strong>Lunghezza brano:</strong> {{$track->length}}</li>
    </ul>   
  </div></div>
@endsection

