@extends('layouts.main')

@section('title', 'Ajouter un type')

@section('content')
    <h2>Ajouter un type</h2>

    <form action="{{ route('type.store') }}" method="post">
        @csrf
        <div>
            <label for="type">Type</label>
            <input type="text" id="type" name="type" 
	       @if(old('type'))
                value="{{ old('type') }}" 
            @endif
	           class="@error('type') is-invalid @enderror">

	@error('type')
            <div class="alert alert-danger">{{ $message }}</div>
     @enderror
        </div>


        <button>Ajouter</button>
   <a href="{{ route('type.index') }}">Annuler</a>
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

    <nav><a href="{{ route('type.index') }}">Retour à l'index</a></nav>
@endsection
