<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.client.index', ['clients' => Client::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.client.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => ['string', 'required'],
            'prenom' => ['string', 'required'],
            'telephone' => ['string', 'required'],
            'adresse' => ['string', 'required'],
            'sexe' => ['string', 'required'],
        ]);

        Client::create($validate);

        return to_route('client.index')->with('success', 'client ajouter');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        // return view('admin.client.form-edit', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('admin.client.form-edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validate = $request->validate([
            'nom' => ['string', 'required'],
            'prenom' => ['string', 'required'],
            'telephone' => ['string', 'required'],
            'adresse' => ['string', 'required'],
            'sexe' => ['string', 'required'],
        ]);

        $client->update($validate);

        return to_route('client.index')->with('success', 'client modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back();
    }
}
