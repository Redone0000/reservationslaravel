@extends ('layouts.main')

@section('title', 'Canceled')

@section('content')

<h3 class="mt-5">Votre réservation a été annulée</h3>

<div class="mt-5">
    <a href="{{ route('show.index') }}" class="btn btn-primary">Retourner a la liste des spectacles</a>
</div>

@endsection