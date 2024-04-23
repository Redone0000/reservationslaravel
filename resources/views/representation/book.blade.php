@extends ('layouts.main')

@section ('title', 'Réserver une représentation')

@section ('content')

<article>
    <h2 class="mt-5"><strong>Réservation</strong></h2>
@php
    $dateAndTime = explode(' ', $rep->when);
    $date = $dateAndTime[0];
    $heure = $dateAndTime[1]; 
@endphp 


<div class="row mt-4">
<div class="col-7">
<table class="table table-bordered">
    <thead style="background-color: #f0f0f0;">
        <tr>
            <th colspan="2">Representation séléctionnée</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Spectacle:</strong></td>
            <td>{{ $rep->show->title }}</td>
        </tr>
        <tr>
            <td><strong>Lieu:</strong></td>
            <td>{{ $rep->location->designation }}</td>
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


</div>
<div class="col-5">
<!-- <p><img src="{{ asset('pictures/'.$rep->show->poster_url) }}" alt="{{ $rep->show->title }}" width="60%"></p> -->
<div class="col p-3 mb-lg-0 border">
<h3 class="mt-2"><strong>Réserver</strong></h3>

<form action="" method="POST" class="mt-4">
    @csrf
    <input type="hidden" name="rep_id" value="{{ $rep->id }}">

    @foreach ($prices as $price)
    <div class="form-group row">
        <label for="places_{{ $price->type }}" class="col-sm-3 col-form-label"><strong>{{ ucfirst($price->type) }}(s)</strong> - {{ $price->price }}€</label>
        <div class="col-sm-9">
            <input type="number" name="places[{{ $price->type }}]" id="places_{{ $price->type }}" class="form-control" data-price="{{ $price->price }}" min="0" value="0" required>
        </div>
    </div>
    @endforeach

    <div class="form-group row mt-4">
        <label class="col-sm-3 col-form-label"><h3><strong>Total</strong></h3></label>
        <div class="col-sm-9 mt-2">
            <span class="form-control-static" id="total">0</span><span>€</span>
        </div>
    </div>
    <div class="form-group">
        <div class="">
            <button type="submit" class="btn btn-primary">Payer</button>
        </div>
    </div>
</form>
</div>

</div>
</div>

</div>

</article>

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

<nav class="mt-4"><a href="{{ route('show.show', $rep->show->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Retour</a></nav>

@endsection