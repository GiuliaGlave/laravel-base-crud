@extends('layouts.app')

@section('page-name', 'Brani')


@section('content')

<h1>lista brani</h1>

<section>

    <form class="d-flex my-4" role="search">
        <input class="form-control me-2" type="search" name="term" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>

     <div class="d-flex">
      <a href="{{ route('tracks.create') }}" type="button" class="btn btn-outline-primary ms-auto">Aggiungi Brano</a>
    </div>

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
        <td>
            <a href="{{route('tracks.show', ['track' => $track])}}">Dettagli</a>
            <a href="{{-- {{ route('tracks.xxx') }} --}}" type="button" class="btn ">&hearts;</a>
            <a href="{{-- {{ route('tracks.xxx') }} --}}" type="button" class="btn ">&hearts;</a>
            <a href="{{-- {{ route('tracks.xxx') }} --}}" type="button" class="btn ">&hearts;</a>
            <a href="{{-- {{ route('tracks.xxx') }} --}}" type="button" class="btn ">&hearts;</a>
        </td>
        </tr> 
        @endforeach
    </tbody>
    </table>
</section>
@endsection


