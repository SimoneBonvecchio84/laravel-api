@extends('layouts.admin')

@section('content')
    <h1>Dettagli Progetto</h1>
    <h2>Titolo: {{ $project->title }}</h2>
    <h3>Descrizione</h3>
    <p>{{ $project->content }}</p>
    <div>
        <ul>
            @foreach ($project->technologies as $technology )
            <div class="py-2">
                <li> Nome Tecnologia: <strong>{{ $technology->name }}</strong>  </li> 
                <li> Nome Autore: <strong>{{ $technology->author }}</strong>  </li>
                <li> Tipo: <strong>{{ $technology->types }}</strong>  </li>
            </div>
            @endforeach
        </ul>
    </div>
@endsection