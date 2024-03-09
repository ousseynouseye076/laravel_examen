@extends('layouts.admin.base')


@section('title', 'Formulaire Produit')

@section('content')

<h2> @yield('title') </h2>


<div class="container">
    <div class="m-auto mt-5 card col-md-8" >
        <div class="card-header">
            <div class="card-title">
                Formulaire ajouter un produit
            </div>
        </div>
        <div class="card-body">
            <form class="needs-validation" method="POST" action="{{ route('produit.store') }}">
                @csrf


                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='titre'><strong>Nom</strong></label>
                    <input class="form-control" name="nom" value="{{ old('nom') }}" type="text" required id="titre">
                </div>
                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='description'><strong>description</strong></label>
                    <textarea name="description" id="description" class="form-control"
                    cols="30" rows="10">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='prix'><strong>Prix</strong></label>
                    <input class="form-control" name="prix" value="{{ old('prix') }}" type="number" required id="prix">

                </div>

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='quantite'><strong>Quantite en stock</strong></label>
                    <input class="form-control" name="quantite" value="{{ old('quantite') }}" type="number"
                    required id="quantite">
                </div>

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='category_id'><strong>Categorie</strong></label>
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
