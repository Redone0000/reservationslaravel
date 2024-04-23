<!-- resources/views/artist/index.blade.php -->

@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1>Liste des artistes</h1>

        <div class="mb-3">
            Ajouter artiste
        </div>
        <div class="mb-3">
            <a href="{{ route('artist.create') }}" class="btn btn-primary">Ajouter</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artists as $artist)
                    <tr>
                        <td>{{ $artist->firstname }}</td>
                        <td>
                            <a href="{{ route('artist.show', $artist->id) }}">{{ $artist->lastname }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
