@extends('layouts.admin.base')

@section('content')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Clients') }}
        </h2>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <a href="{{ route('client.create') }}" class="btn btn-primary">
                {{ __('Creer un client') }}
            </a>

            <table class="table table-striper">
                <caption></caption>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Sexe</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>

                            <td>{{ $client->nom }}</td>
                            <td>{{ $client->prenom }}</td>
                            <td>{{ $client->telephone }}</td>
                            <td>{{ $client->adresse }}</td>
                            <td>{{ $client->sexe }}</td>
                            <td class="d-flex justify-content-center">

                                <a href="{{ route('client.edit', $client) }}" class="btn btn-success">
                                    {{ __('Modifier') }}
                                </a>

                                <form method="Post" class="d-inline" action='{{ route('client.destroy', $client) }}'>
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger"
                                    onclick="!confirm('Voulez-vous supprimer ce client ?')
                                    ? event.preventDefault()
                                    : this.closets('form').submit"
                                    >
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
