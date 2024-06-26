@extends('layouts.main')

@section('title', 'Liste des représentations')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <ul class="list-item-group">
    @foreach($representations as $representation)
    <!-- <li class="list-item">{{ $representation->show->title }} -->
    <li class="list-item">
    <a href="{{ route('representation.show', $representation->id) }}">{{ $representation->show->title }}</a>
        @if($representation->location)
        - <span>{{ $representation->location->designation }}</span>
        @endif
        - <datetime>{{ substr($representation->when,0,-3) }}</datetime>
    </li>
    @endforeach
    </ul>
    <a href="http://127.0.0.1:8000/feed" class="btn btn-primary"><i class="fa fa-rss"></i></a>
@endsection
