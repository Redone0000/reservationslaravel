@extends('layouts.main')

@section('title', 'Ajouter une location')

@section('content')
    <h2>Ajouter une location</h2>

    <form action="{{ route('location.store') }}" method="post">
        @csrf
        <div>
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" 
	       @if(old('slug'))
                value="{{ old('slug') }}" 
            @endif
	           class="@error('slug') is-invalid @enderror">

	@error('type')
            <div class="alert alert-danger">{{ $message }}</div>
     @enderror
        </div>


        <button>Ajouter</button>
   <a href="{{ route('location.index') }}">Annuler</a>
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

    <nav><a href="{{ route('location.index') }}">Retour à l'index</a></nav>
@endsection
