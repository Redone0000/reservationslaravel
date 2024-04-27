@extends('layouts.main')

@section('title', 'Liste des réservations')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <ul class="list-item-group">
    @foreach($reservations as $reservation)
    <li class="list-item">
    </li>
    @endforeach
    </ul>
    <a href="http://127.0.0.1:8000/feed" class="btn btn-primary"><i class="fa fa-rss"></i></a>
@endsection
