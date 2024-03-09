<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Produit $produit)
    {
        $clients = Client::all();
        return view('commande.form', compact('produit', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'client_id' => ['required', 'integer'],
                'produit_id' => ['required', 'integer'],
                'quantite_achete' => ['required', 'integer']
                ]
        );

        Commande::create($validate);

        $produit = Produit::find($validate['produit_id']);

        $new_quantity = $produit->quantite - $validate['quantite_achete'];

        $produit->update(['quantite' => $new_quantity]);

        return to_route('produits.liste')->with('success', 'commande effectuer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
