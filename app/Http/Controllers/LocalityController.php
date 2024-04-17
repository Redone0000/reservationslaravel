<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locality;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localities = Locality::all();

        return view('locality.index',[
            'localities' => $localities,
            'resource' => 'Localités',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locality.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'postal_code' => 'required|max:6',
            'locality' => 'required|max:60',
        ]);

        $locality = new Locality();

        $locality->postal_code = $validated['postal_code'];
        $locality->locality = $validated['locality'];

        $locality->save();

        return redirect()->route('locality.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $locality = Locality::find($id);
        
        return view('locality.show',[
            'locality' => $locality,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $locality = Locality::find($id);
        
        return view('locality.edit',[
            'locality' => $locality,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'postal_code' => 'required|max:6',
            'locality' => 'required|max:60',
        ]);

	   //Le formulaire a été validé, nous récupérons l’artiste à modifier
        $locality = Locality::find($id);

	   //Mise à jour des données modifiées et sauvegarde dans la base de données
        $locality->update($validated);

        return view('locality.show',[
            'locality' => $locality,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $locality = Locality::find($id);

        if($locality) {
            $locality->delete();
        }

        return redirect()->route('locality.index');
    }
}
