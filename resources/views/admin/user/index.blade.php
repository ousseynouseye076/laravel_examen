@extends('layouts.admin.base')

@section('content')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisteurs') }}
        </h2>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('user.create') }}" class="btn btn-primary">
                {{ __('Creer un utilisateur') }}
            </a>

            <table class="table table-striper">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ asset('/storage/' . $user->photo) }}" alt="image" width="50" height="50">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td class="d-flex justify-content-center">

                                <a href="{{ route('user.edit', $user) }}" class="btn btn-success">
                                    {{ __('Modifier') }}
                                </a>

                                <form method="Post" class="d-inline" action='{{ route('user.destroy', $user) }}'>
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger"
                                    onclick="!confirm('Voulez-vous supprimer cette utilisateur ?') ? event.preventDefault() : this.closets('form').submit">
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
