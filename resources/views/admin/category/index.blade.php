@extends('layouts.admin.base')

@section('content')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('category.create') }}" class="btn btn-primary">
                {{ __('Creer une categorie') }}
            </a>

            <table class="table table-striper">
                <thead>
                    <tr>
                        <th>Nom Categorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->titre }}</td>
                            <td class="d-flex justify-content-center">

                                <a href="{{ route('category.edit', $category) }}" class="btn btn-success">
                                    {{ __('Modifier') }}
                                </a>

                                <form method="Post" class="d-inline" action='{{ route('category.destroy', $category) }}'>
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
