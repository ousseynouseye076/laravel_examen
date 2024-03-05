@extends('layouts.admin.base')


@section('title', 'Formulaire Produit')

@section('content')

<h2> @yield('title') </h2>


<div class="container">
    <div class="card col-md-8 mt-5 m-auto" >
        <div class="card-header">
            <div class="card-title">
                Formulaire ajouter un produit
            </div>
        </div>
        <div class="card-body">
            <form class="needs-validation" method="POST" action="{{ route('produit.store') }}">
                @csrf

                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='titre'><strong>Titre</strong></label>
                    <input class="form-control" name="titre" value="{{ old('titre') }}" type="text" required id="titre">
                </div>
                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='titre'><strong>Titre</strong></label>
                    <input class="form-control" name="titre" value="{{ old('titre') }}" type="text" required id="titre">
                </div>

                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='titre'><strong>Titre</strong></label>
                    <input class="form-control" name="titre" value="{{ old('titre') }}" type="text" required id="titre">
                </div>

                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='category_id'><strong>Categorie</strong></label>
                    <select class='form-control' name="category_id" id="category_id">
                        <option selected value="" disabled>Choisir la category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->titre }}</option>
                        @endforeach

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>

    </div>

</div>



@endsection
