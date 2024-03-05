@extends('layouts.admin.base')


@section('title', 'Formulaire Category')

@section('content')

<h2> @yield('title') </h2>


<div class="container">
    <div class="card col-md-8 mt-5 m-auto" >
        <div class="card-header">
            <div class="card-title">
                Formulaire modification de la Categorie
            </div>
        </div>
        <div class="card-body">
            <form class="needs-validation" method="POST" action="{{ route('category.update', $category) }}">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='titre'><strong>Titre</strong></label>
                    <input class="form-control" name="titre" value="{{ old('titre', $category->titre) }}" type="text" required id="titre">
                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>

    </div>

</div>



@endsection
