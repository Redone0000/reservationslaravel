@extends('layouts.main')

@section('title', 'Liste des location')

@section('content')
    <div class="container">
        <h1>Liste des {{ $resource }}</h1>
        <div class="mb-3">
            <a href="{{ route('location.create') }}" class="btn btn-primary">Ajouter</a>
        </div>
        <ul class="list-group">
            @foreach($locations as $location)
            <li class="list-group-item"><a href="{{ route('location.show', $location->id) }}">{{ $location->designation }}</a>
                @if($location->website)
                - <a href="{{ $location->website }}">{{ $location->website }}</a>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
@endsection