<link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Commader du') }} {{ $produit->nom }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="m-auto card col-md-4">
            <div class="card-body">
                <form action="{{ route('commande.store') }}" method="Post">
                    @csrf

                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">

                    <div class="form-group">
                        <label for="client">Client</label>
                        <select class="mb-5 form-control" id="client" name="client_id" required>
                        <option value="">Choisir le client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->prenom }} {{ $client->nom }}</option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <label for="quantite">Quantite</label>
                        <input class="mb-5 form-control" id="quantite"
                        type="number" max="{{ $produit->quantite }}"
                        name="quantite_achete" required
                        >
                    </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Faire la commande</button>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>

