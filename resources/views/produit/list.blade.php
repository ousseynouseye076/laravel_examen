<link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Produits') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="gap-2 mx-4 d-flex">
            @foreach ($produits as $produit)
                <div class="card col-md-3">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ $produit->nom }}
                        </h4>
                        <span class="float">
                            {{ $produit->category->titre }}
                        </span>
                    </div>
                    <div class="card-body">
                        <p>{{ $produit->description }}</p>
                        <p>{{ $produit->prix }} Fcfa</p>
                        <a class="mt-5 btn btn-primary" href="{{ route('commande.create', $produit) }}">
                            Commander
                        </a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</x-app-layout>
