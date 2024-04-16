@extends('layouts.main')

@section('title', 'Liste des types d’artistes')

@section('content')
    <div class="container">
        <h1>Liste des {{ $resource }}</h1>
        <div class="mb-3">
            <a href="{{ route('type.create') }}" class="btn btn-primary">Ajouter</a>
        </div>
        <ul class="list-group">
            @foreach($types as $type)
                <li class="list-group-item">
                    <a href="{{ route('type.show', $type->id) }}">{{ $type->type }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
