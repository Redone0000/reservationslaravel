@extends('layouts.main')

@section('title', 'Liste des spectacles')

@section('content')
<div class="container">
<h2 class="mt-5"><strong>Agenda des {{ $resource }}</strong></h2>
<div class="row mt-5">
<div class="col-8">
<table class="table table-bordered">
    <thead style="background-color: #f0f0f0;">
        <tr>
            <th>spectacle</th>
            <th>description</th>
            <th>reservable</th>
            <th>image</th>
        </tr>
    </thead>
    <tbody>
    @foreach($shows as $show)
        <tr>
            <td><a href="{{ route('show.show', $show->id) }}">{{ $show->title }}</a></td>
            <td>{{ $show->description }}</td>

                @if($show->bookable == 1)
                <td>Oui</td>
                @else
                <td>Non</td>
                @endif
            <td class="p-0 m-0"><img src="{{ asset('pictures/'.$show->poster_url) }}" alt="{{ $show->title }}" width="100px"></td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
<div class="col-4 bg-light  border">

<form action="" method="GET" class="mt-4 p-3">
    <div class="form-group">
        <label for="date" class="mb-3"><strong>Sélectionnez une date :</strong></label>
        <input type="date" id="date" name="date" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Filtrer par date</button>
</form>

</div>
</div>
</div>


@endsection
