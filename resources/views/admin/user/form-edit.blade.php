@extends('layouts.admin.base')


@section('title', 'Formulaire Utilisateur')

@section('content')

<h2> @yield('title') </h2>


<div class="container">
    <div class="card col-md-8 mt-5 m-auto" >
        <div class="card-header">
            <div class="card-title">
                Formulaire Modifier Utilisateur
            </div>
        </div>
        <div class="card-body">
            <form class="needs-validation" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='photo'><strong>Photo</strong></label>
                    <input class="form-control" name="photo" value="{{ old('photo') }}" type="file" required id="photo">
                    @error('photo')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='name'><strong>Nom</strong></label>
                    <input class="form-control" name="name" value="{{ old('name', $user->name) }}" type="text" required id="name">
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='prenom'><strong>Prenom</strong></label>
                    <input class="form-control" name="prenom" value="{{ old('prenom', $user->prenom) }}" type="text" required id="prenom">
                    @error('prenom')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='email'><strong>Email</strong></label>
                    <input class="form-control" name="email" value="{{ old('email',  $user->email) }}" type="email" required id="email">
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='password'><strong>Mot de passe</strong></label>
                    <input class="form-control" name="password" type="password" required id="password">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="label-control mb-2" for='role'><strong>Mot de passe</strong></label>
                    <select name="role"  id='role' class="form-control" >
                        <option value="{{ $user->role }}" selected disabled>{{ $user->role }}</option>
                        <option value="{{ App\Models\User::ROLE_ADMIN }}">Administrateur</option>
                        <option value="{{ App\Models\User::ROLE_USER_SIMPLE }}">Utilisateur simple</option>
                    </select>
                    @error('role')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>

    </div>

</div>



@endsection
