@extends('layouts.main')

@section('title', 'Modifier un artiste')

@section('content')
    <h2>Créer un artiste</h2>

<form action="{{ route('reservation.store') }}" method="post">
    @csrf
    <div>
        <label for=""></label>
        <input type="text" id="" name="" 
       @if(old('firstname'))
            value="{{ old('') }}"  
        @endif
           class="@error('') is-invalid @enderror">

@error('')
        <div class="alert alert-danger">{{ $message }}</div>
 @enderror
    </div>

    <div>
        <label for=""></label>
        <input type="text" id="" name="" 
       @if(old(''))
            value="{{ old('') }}" 
        @endif
           class="@error('') is-invalid @enderror">

@error('')
        <div class="alert alert-danger">{{ $message }}</div>
 @enderror
    </div>

    <button>Ajouter</button>
<a href="{{ route('reservations') }}">Annuler</a>
</form>

@if ($errors->any())
<div class="alert alert-danger">
   <h2>Liste des erreurs de validation</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<nav><a href="{{ route('artist.index') }}">Retour à l'index</a></nav>

@endsection
