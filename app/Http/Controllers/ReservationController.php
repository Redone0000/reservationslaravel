<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Representation;
use App\Models\Price;
use App\Models\Show;



class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();

        return view('reservation.index',[
            'reservations' => $reservations,
            'resource' => 'reservations',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

        ]);

        $representationId = $request->get('representation_id');
        $places = $request->get('places');
        $total = 0;

        foreach($places as $type => $quantity) {

            $price = Price::where('type', $type)->first();

            if ($price) { 
                $total += intval(floatval($price->price) * intval($quantity));
            }
        }

        $representation = Representation::find($representationId);

        return redirect()->route('reservation.pay', [
            'places' => $places,
            'representationId' => $representation->id,
            'total' => $total,
        ]);

        return redirect()->route('show.show', ['id' => $representation->show->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function book(Request $request, $id)
    {
        $representation = Representation::find($id);
        $prices = Price::all();

        return view('reservation.book', [
            'representation' => $representation,
            'prices' => $prices,
        ]);
    }

    public function pay(Request $request)
    {       
        $representationId = $request->get('representationId');
        $total = $request->get('total');
        $places = $request->get('places');

        $stripe = \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $representation = Representation::find($representationId);
        $title = $representation->show->title;
        $when = $representation->when;

        $reservationItems = [];


        foreach($places as $type => $quantity) {
            if ($quantity > 0) {
            $price = Price::where('type', $type)->first();
            $reservationItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $price->price * 100,
                    'product_data' => [
                        'name' => "{$title}",
                        'description' => "Réservation de $quantity places $type pour $title le $when",
                    ],
                ],
                'quantity' => $quantity,
            ];
            
            $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => $reservationItems,
            'mode' => 'payment',
            'success_url' => route('reservation.success'),
            'cancel_url' => route('reservation.cancel'),
        ]);
    }
        }

        if (empty($reservationItems)) {
            throw new \Exception("Il n'y a pas de réservation à traiter.");
        }

        return redirect($checkout_session->url);

    }

    public function success() {
        return view('reservation.success');
    }

    public function cancel() {
        return view('reservation.cancel');
    }

}
