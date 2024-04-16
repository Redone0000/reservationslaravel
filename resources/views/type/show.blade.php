@extends('layouts.main')

@section('title', 'Fiche d\'un type')

@section('content')
    <h1>{{ ucfirst($type->type) }}</h1>
    <div><a href="{{ route('type.edit' ,$type->id) }}" >Modifier</a></div>
    <form method="post" action="{{ route('type.delete', $type->id) }}">
        @csrf
        @method('DELETE')
        <button>Supprimer</button>
    </form>
    <h2>Liste des artistes</h2>

    <nav><a href="{{ route('type.index') }}">Retour à l'index</a></nav>
@endsection