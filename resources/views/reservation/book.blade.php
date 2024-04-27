@extends ('layouts.main')

@section ('title', 'Réserver une représentation')

@section ('content')
<div class="container">

<h2 class="mt-5"><strong>Réservation</strong></h2>
@php
    $dateAndTime = explode(' ', $representation->when);
    $date = $dateAndTime[0];
    $heure = $dateAndTime[1]; 
@endphp 


<div class="row mt-4">
<div class="col-7">
<table class="table table-bordered">
    <thead style="background-color: #f0f0f0;">
        <tr>
            <th colspan="2">Détails de la représentation</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Spectacle:</strong></td>
            <td>{{ $representation->show->title }}</td>
        </tr>
        <tr>
            <td><strong>Lieu:</strong></td>
            <td>{{ $representation->location->designation }}</td>
        </tr>
        <tr>
            <td><strong>Date et heure:</strong></td>
            <td>{{ $date }} - {{ $heure }}</td>
        </tr>
    </tbody>
    <thead style="background-color: #f0f0f0;">
        <tr>
            <th>Type de Prix</th>
            <th>Prix (€)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prices as $price)
            <tr>
                <td><strong>{{ $price->type }}</strong></td>
                <td>{{ $price->price }} €</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
<a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Retourner en arrière</a>
</div>
</div>
<div class="col-5 p-3 border">
<h3 class="mb-3"><strong>Réserver</strong></h3>
<form action="{{ route('reservation.store') }}" method="post">
    @csrf
    <input type="hidden" name="representation_id" value="{{ $representation->id }}">

    @foreach($prices as $price)
    <div class="form-group">
        <label for="places_{{ $price->type }}"><strong>{{ $price->type }}</strong></label>
        <input type="number" name="places[{{ $price->type }}]" id="places_{{ $price->type }}"  class="form-control" data-price="{{ $price->price }}" value="0" min="0">
    </div> 
    @endforeach

    <div>
        <p class="mt-4"><strong>Total</strong> : <span id="total">0</span>€</p>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Continuer vers le paiement</button>

</form>
</div>
</div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
const inputs = document.querySelectorAll('input[type="number"]');
const totalElement = document.getElementById('total');


function updateTotal() {
    let total = 0;
    
    inputs.forEach(input => {
        const price = parseFloat(input.dataset.price);
        const quantity = parseInt(input.value, 10) || 0;
        total += price * quantity;
    });

    totalElement.textContent = total;
}

inputs.forEach(input => input.addEventListener('input', updateTotal));


// Initialiser le total à 0€
updateTotal();
});
</script>
@endsection