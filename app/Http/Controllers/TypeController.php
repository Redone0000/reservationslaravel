<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        
        return view('type.index',[
            'types' => $types,
            'resource' => 'types',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|max:60',
        ]);

        $type = new Type();

        $type->type = $validated['type'];

        $type->save();

        return redirect()->route('type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = Type::find($id);
        
        return view('type.show',[
            'type' => $type,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = Type::find($id);
        
        return view('type.edit',[
            'type' => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'type' => 'required|max:60',
        ]);

	   //Le formulaire a été validé, nous récupérons l’artiste à modifier
        $type = Type::find($id);

	   //Mise à jour des données modifiées et sauvegarde dans la base de données
        $type->update($validated);

        return view('type.show',[
            'type' => $type,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::find($id);

        if($type) {
            $type->delete();
        }

        return redirect()->route('type.index');
    }
}
