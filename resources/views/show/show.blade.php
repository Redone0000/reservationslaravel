@extends('layouts.main')

@section('title', 'Fiche d\'un spectacle')

@section('content')
    <div class="container">

    <div class="row justify-content-end mt-5">
        <a href="{{ route('show.index') }}" class="btn btn-secondary mt-2">Retour à l'index</a>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            @if($show->poster_url)
            <p><img src="{{ asset('pictures/'.$show->poster_url) }}" alt="{{ $show->title }}" width="90%"></p>
            @else
            <canvas width="200" height="100" style="border:1px solid #000000;"></canvas>
            @endif
        </div>
        <div class="col-8">
            <div class="row mt-2 mb-3">
            <h1 class="col-8"><strong>{{ $show->title }}</strong></h1>
            @if($show->bookable)
            <h3 class="col-4 mt-2"><em>Réservable</em></h3>
            @else
            <h3 class="col-4 mt-2"><em style="color:red;">Non réservable</em></h3>
            @endif
            </div>
            <div class="row">
                @if($show->description)
                <h3 class=""><strong>Description:</strong></h3>
                <p class="p-2">{{ $show->description }}</p>
                @endif
            </div>
            <div class="row">
            <h3 class="mb-3 mt-3"><strong>Liste des représentations</strong></h3>
            @if($show->representations->count() >= 1)
                <div class="table-responsive">
                    <table class="table">
                        <thead style="background-color: #f0f0f0;">
                            <tr>
                                <th>Date</th>
                                <th>Lieu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show->representations as $representation)
                                <tr>
                                    <td>{{ $representation->when }}</td>
                                    <td>
                                        @if($representation->location)
                                            {{ $representation->location->designation }}
                                        @elseif($representation->show->location)
                                            {{ $representation->show->location->designation }}
                                        @else
                                            Lieu à déterminer
                                        @endif
                                    </td>
                                    <td>
                                    @if($representation->location)
                                        <a href="{{ route('representation.book', $representation->id )}}" class="btn btn-sm btn-primary">Réserver</a>
                                    @else
                                        <a href="" class="btn btn-sm btn-danger disabled">Réserver</a>

                                        @endif
                                    <!-- <a href="{{ route('representation.book', $representation->id )}}" class="btn btn-sm btn-primary">Réserver</a>-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div>
                    <h3 class="">Aucune représentation</h3>
                </div>
            @endif
            </div>
        </div>
</div>
    <div class="row">
        <div class="col-4 p-4">
        <h4 class="mb-2"><strong>Tarifs:</strong></h4>
                <ul class="list-group">
                @foreach ($prices as $price)
                <!-- Afficher les réservations de représentation -->
                    <li class="list-group-item d-flex justify-content-between "><strong>{{ $price->type}} :</strong><span class="text-right">{{ $price->price}} €</span></li>
                @endforeach
                <ul>

        </div>
        <div class="col-8">
        <h3 class="mb-3 mt-3"><strong>Liste des artistes</strong></h3>
        <table class="table table-bordered">
        <thead style="background-color: #f0f0f0;">
            <tr>
                <th>Type</th>
                <th>Artistes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($show->artistTypes->groupBy('type.type') as $type => $artists)
                <tr>
                    <td>
                        @if($type == 'comédien')
                            <strong>Distribution :</strong>
                        @else
                            <strong>{{ ucfirst($type) }} :</strong>
                        @endif
                    </td>
                    <td>
                        <ul class="list-unstyled">
                            @foreach($artists as $art)
                                <li>{{ $art->artist->firstname }} {{ $art->artist->lastname }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    <div>
</div>
    </div>
@endsection
