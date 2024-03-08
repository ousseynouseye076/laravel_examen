@extends('layouts.admin.base')


@section('title', 'Formulaire Client')

@section('content')

<h2> @yield('title') </h2>


<div class="container">
    <div class="m-auto mt-5 card col-md-8" >
        <div class="card-header">
            <div class="card-title">
                Formulaire Modifier Client
            </div>
        </div>
        <div class="card-body">
            <form class="needs-validation" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='photo'><strong>Photo</strong></label>
                    <input class="form-control" name="photo" value="{{ old('photo') }}" type="file" required id="photo">
                    @error('photo')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='name'><strong>Nom</strong></label>
                    <input class="form-control" name="name" value="{{ old('name', $user->name) }}" type="text" required id="name">
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='prenom'><strong>Prenom</strong></label>
                    <input class="form-control" name="prenom" value="{{ old('prenom', $user->prenom) }}" type="text" required id="prenom">
                    @error('prenom')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='email'><strong>Email</strong></label>
                    <input class="form-control" name="email" value="{{ old('email',  $user->email) }}" type="email" required id="email">
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='password'><strong>Mot de passe</strong></label>
                    <input class="form-control" name="password" type="password" required id="password">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label class="mb-2 label-control" for='role'><strong>Mot de passe</strong></label>
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
