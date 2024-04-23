<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Price;


class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $shows = Show::all();

        $shows = Show::with('representations.representationReservations.price')->get();

        
        return view('show.index',[
            'shows' => $shows,
            'resource' => 'spectacles',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) 
    {
        // $show = Show::with('representations.representationReservations.price')->find($id);
        $show = Show::find($id);
        $prices = Price::all();

        return view('show.show',[
            'show' => $show,
            'prices' => $prices,
        ]);
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
}
