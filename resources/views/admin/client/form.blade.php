@extends('layouts.admin.base')


@section('title', 'Formulaire Client')

@section('content')

<h2> @yield('title') </h2>


<div class="container">
    <div class="m-auto mt-5 card col-md-8" >
        <div class="card-header">
            <div class="card-title">
                Formulaire ajouter Client
            </div>
        </div>
        <div class="card-body">
            <form class="needs-validation" method="POST"
            action="{{ route('client.store') }}">
                @csrf

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='nom'><strong>Nom</strong></label>
                    <input class="form-control" name="nom" value="{{ old('nom') }}" type="text" required id="nom">
                    @error('nom')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='prenom'><strong>Prenom</strong></label>
                    <input class="form-control" name="prenom" value="{{ old('prenom') }}"
                    type="text" required id="prenom">
                    @error('prenom')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='adresse'><strong>Adresse</strong></label>
                    <input class="form-control" name="adresse" value="{{ old('adresse') }}"
                    type="text" required id="adresse">
                    @error('adresse')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='telephone'><strong>Telephone</strong></label>
                    <input class="form-control" name="telephone" value="{{ old('telephone') }}"
                     type="number" required id="telephone">
                    @error('telephone')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='role'><strong>Sexe</strong></label>
                    <select name="sexe"  id='sexe' class="form-control" >
                        <option value="" selected disabled>Sectionner le sexe</option>
                        <option value="F">Feminin</option>
                        <option value="M">Masculin</option>
                    </select>
                    @error('sexe')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>

    </div>

</div>



@endsection
