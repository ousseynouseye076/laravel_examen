<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.produit.index', ['produits' => Produit::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.produit.form', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produit = $request->validate([
            'titre' => ['string', 'required']
        ]);

        Produit::create($produit);

        return to_route('produit.index')->with('success', 'Produit ajouter');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        $categories = Category::all();
        return view('admin.produit.form-edit', ['produit' => $produit, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $Produit)
    {
        $validate = $request->validate([
            'titre' => ['string', 'required']
        ]);

        $produit->update($validate);

        return to_route('produit.index')->with('success', 'produit modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()->back()->with('success', 'Produit supprimer');
    }
}
