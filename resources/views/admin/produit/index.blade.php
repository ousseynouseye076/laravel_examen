@extends('layouts.admin.base')

@section('content')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Produits') }}
        </h2>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <a href="{{ route('produit.create') }}" class="btn btn-primary">
                {{ __('Creer une produit') }}
            </a>

            <table class="table table-striper">
                <thead>
                    <tr>
                        <th>Nom Produit</th>
                        <th>Description</th>
                        <th>Categorie</th>
                        <th>Prix</th>
                        <th>Quantite</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $produit)
                        <tr>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->description }}</td>
                            <td>{{ $produit->category->titre }}</td>
                            <td>{{ $produit->prix }}</td>
                            <td>{{ $produit->quantite }}</td>
                            <td class="d-flex justify-content-center">

                                <a href="{{ route('produit.edit', $produit) }}" class="btn btn-success">
                                    {{ __('Modifier') }}
                                </a>

                                <form method="Post" class="d-inline" action='{{ route('produit.destroy', $produit) }}'>
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger">
                                        {{ __('Supprimer') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
