@extends('layouts.main')

@section('title', 'Success')

@section('content')
    <div class="container">
        <h3 class="mt-5 bg-light">Paiement effectuer avec succès</h3>
        <div class="mt-5">
            <a href="{{ route('show.index') }}" class="btn btn-primary">Retourner a la liste des spectacles</a>
        </div>
    </div>
@endsection


