@extends('layouts.main')

@section('title', 'Fiche d\'un type')

@section('content')
    <h1>{{ $locality->postal_code }} {{ $locality->locality }}</h1>
    <div><a href="{{ route('locality.edit' ,$locality->id) }}" >Modifier</a></div>
    <form method="post" action="{{ route('locality.delete', $locality->id) }}">
        @csrf
        @method('DELETE')
        <button>Supprimer</button>
    </form>
    <ul class="list-group">
    @foreach($locality->locations as $location)
        <li class="list-group-item">{{ $location->designation }}</li>
    @endforeach
    </ul>
    <div class="mt-3">
        <nav><a href="{{ route('locality.index') }}">Retour à l'index</a></nav>
    </div>
@endsection