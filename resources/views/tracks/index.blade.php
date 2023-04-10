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
            <a href="{{route('tracks.show', ['track' => $track])}}">dettagli</a>
            <span> </span>
            <a href="{{route('tracks.edit', ['track' => $track])}}">modifica</i></a>
            <span> </span>
           <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            elimina
                        </button>
            <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">conferma eliminazione</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                sicuro di voler eliminare il brano?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">annulla</button>

                                <form action="{{ route('tracks.destroy', $track) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">elimina</button>
                                </form>
                                </div>
        </td>
        </tr> 
        @endforeach
    </tbody>
    </table>
</section>
@endsection


