@extends('layouts.main')

@section('title', 'Liste des localités')

@section('content')
    <div class="container">
        <h1>Liste des localités</h1>
        <div class="mb-3">
            <a href="{{ route('locality.create') }}" class="btn btn-primary">Ajouter</a>
        </div>
        <ul class="list-group">
            @foreach($localities as $locality)
                <li class="list-group-item">
                    <a href="{{ route('locality.show', $locality->id) }}">{{ $locality->locality}}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection