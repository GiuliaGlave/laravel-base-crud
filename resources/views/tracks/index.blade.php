@extends('layouts.app')

@section('page-name', 'Brani')


@section('content')

<h1>lista brani</h1>

<section>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">tiolo</th>
        <th scope="col">album</th>
        <th scope="col">autore</th>
        <th scope="col">produttore</th>
        <th scope="col">lunghezza brano</th>
        <th scope="col">modifica</th>

       
        </tr>
    </thead>
    <tbody >
        @foreach ($tracks as $track)
        <tr >
        <td>{{$track->title}}</td>
        <td>{{$track->album}}</td>
        <td>{{$track->author}}</td>
        <td>{{$track->editor}}</td>
        <td>{{$track->length}}</td>
        <td><a href="{{route('tracks.show', ['track' => $track])}}">link</a></td>
        </tr> 
        @endforeach
    </tbody>
    </table>
</section>
@endsection


