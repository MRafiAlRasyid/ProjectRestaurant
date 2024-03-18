<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('register.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function user()
    {
        $users = User::all();
        $usersCount = User::count();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('login.index')->with('success', 'Registrasi success. Please login!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        return view('admin.user.edit', compact('users'));
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
        
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.user.index')->with('success', 'Data berhasil di edit!');
        } else {
            return redirect('/')->with('success', 'Data berhasil diedit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $users = User::find($id);
        
        $users->delete();

        return redirect()->route('admin.user.index')->with('success', 'Data berhasil dihapus!');
    }
}