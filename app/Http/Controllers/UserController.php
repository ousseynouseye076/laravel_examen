<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index', ['users' => User::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => ['string', 'required'],
            'photo' => ['image', 'extensions:png,jpg,jpeg,gif'],
            'prenom' => ['string', 'required'],
            'password' => ['string', 'required'],
            'email' => ['email', 'required'],
            'role' => ['string', 'required']
        ]);

        $photo = $request->file('photo')->store('photo');

        $validate['photo'] = $photo;

        User::create($validate);

        return to_route('user.index')->with('success', 'User ajouoter');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.form-edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => ['string', 'required'],
            'photo' => ['image', 'extensions:.png,.jpg,.jpeg,.gif',],
            'prenom' => ['string', 'required'],
            'password' => ['string', 'required'],
            'email' => ['email', 'required'],
            'role' => ['string', 'required']

        ]);
        
        $photo = $request->file('photo')->store('photo');

        $validate['photo'] = $photo;

        $user->update($validate);

        return to_route('user.index')->with('success', 'user modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'User supprimer');
    }
}
