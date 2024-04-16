@extends('layouts.main')

@section('title', 'Fiche d\'un artiste')

@section('content')
    <div class="container">
        @if($artist)
            <h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>
            <div><a href="{{ route('artist.edit' ,$artist->id) }}" >Modifier</a></div>
            <form method="post" action="{{ route('artist.delete', $artist->id) }}">
                @csrf
                @method('DELETE')
                <button>Supprimer</button>
            </form>

            <nav><a href="{{ route('artist.index') }}">Retour à l'index</a></nav>
        @else
            <p>Aucun artiste trouvé.</p>
            <nav><a href="{{ route('artist.index') }}">Retour à l'index</a></nav>
        @endif
        <h2>Liste des types</h2>
        <ul class="list-group">
            @foreach($artist->types as $type)
                <li class="list-group-item">{{ $type->type }}</li>
            @endforeach
        </ul>
    </div>
@endsection