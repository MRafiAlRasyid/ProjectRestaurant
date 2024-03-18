<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $users = User::find($id);
        return view('user.profil.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $users = User::find($id);
        $users->update($validated);

        return redirect()->route('user.profil.index', ['id' => $users->id])->with('success', 'Profil berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(profil $profil)
    {
        //
    }
}