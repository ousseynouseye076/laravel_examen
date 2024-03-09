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
                    <label class="label-control mb-2" for='name'><strong>Nom</strong></label>
                    <input class="form-control" name="nom" value="{{ old('name') }}" type="text" required id="nom">
                </div>
                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='description'><strong>Desription</strong></label>
                    <input class="form-control" name="description" value="{{ old('description') }}" type="text" required id="description">
                </div>

                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='prix'><strong>Prix</strong></label>
                    <input class="form-control" name="prix" value="{{ old('titre') }}" type="number" required id="prix">
                </div>
                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='photo'><strong>Photo</strong></label>
                    <input class="form-control" name="photo" value="{{ old('photo') }}" type="file" required id="photo">
                    @error('photo')
                        <span>{{ $message }}</span>
                    @enderror
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
