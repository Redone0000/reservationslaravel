@extends('layouts.main')

@section('title', 'Modifier une location')

@section('content')

    <h2>Modifier un location</h2>

<form action="{{ route('location.update' ,$location->id) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="slug">Slug</label>
        <input type="text" id="slug" name="slug" 
       @if(old('slug'))
            value="{{ old('slug') }}" 
        @else
            value="{{ $location->slug }}" 
        @endif
           class="@error('slug') is-invalid @enderror">

@error('slug')
        <div class="alert alert-danger">{{ $message }}</div>
 @enderror
    </div>
    <div>
        <label for="designation">Designation</label>
        <input type="text" id="designation" name="designation" 
       @if(old('designation'))
            value="{{ old('designation') }}" 
        @else
            value="{{ $location->designation }}" 
        @endif
           class="@error('designation') is-invalid @enderror">

@error('designation')
        <div class="alert alert-danger">{{ $message }}</div>
 @enderror
    </div>
    <div>
        <label for="address">Address</label>
        <input type="text" id="address" name="address" 
       @if(old('address'))
            value="{{ old('address') }}" 
        @else
            value="{{ $location->address }}" 
        @endif
           class="@error('address') is-invalid @enderror">

@error('address')
        <div class="alert alert-danger">{{ $message }}</div>
 @enderror
    </div>
    <div>
        <label for="website">Website</label>
        <input type="text" id="website" name="website" 
       @if(old('website'))
            value="{{ old('website') }}" 
        @else
            value="{{ $location->website }}" 
        @endif
           class="@error('website') is-invalid @enderror">

@error('website')
        <div class="alert alert-danger">{{ $message }}</div>
 @enderror
    </div>
    <div>
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" 
       @if(old('phone'))
            value="{{ old('phone') }}" 
        @else
            value="{{ $location->phone }}" 
        @endif
           class="@error('phone') is-invalid @enderror">

@error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
 @enderror
    </div>


    <button>Modifier</button>
<a href="{{ route('location.show',$location->id) }}">Annuler</a>
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
