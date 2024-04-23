@extends('layouts.main')

@section('title', 'Liste des spectacles')

@section('content')
<div class="container">
<h2 class="mt-3"><strong>Liste des {{ $resource }}</strong></h2>


<div class="row mt-4">
<div class="col-10">
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
            <td><img src="{{ asset('pictures/'.$show->poster_url) }}" alt="{{ $show->title }}" width="65px"></td>
        </tr>
        @endforeach
    </tbody>
</table>


</div>
</div>
@endsection
