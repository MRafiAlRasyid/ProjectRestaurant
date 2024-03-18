<?php

namespace App\Http\Controllers;

use App\Models\chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs = chef::all();
        $chefsCount = chef::count();
        return view('admin.chef.index', compact('chefs', 'chefsCount'));
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
        $validated = $request->validate([
            'nama' => 'required',
            'gambar' => 'required',
            'posisi' => 'required',
        ]);


        $imageName = $request->file('gambar')->hashName();
        $validated['gambar'] = $imageName;
        $chefDirectory = public_path() . '/asset-gambar';
        $request->file('gambar')->move($chefDirectory, $imageName);

        chef::create($validated);
        return redirect()->route('admin.chef.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(chef $chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(chef $chef)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'gambar' => 'required',
            'nama' => 'required',
            'posisi' => 'required',
        ]);

        $chefs = chef::find($id);

        File::delete(public_path() . "/asset-gambar/$chefs->gambar");

        $imageName = $request->file('gambar')->hashName();
        $validated['gambar'] = $imageName;
        $chefDirectory = public_path() . '/asset-gambar';
        $request->file('gambar')->move($chefDirectory, $imageName);
        $chefs->update($validated);

        return redirect()->route('admin.chef.index')->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chefs = chef::find($id);

        File::delete(public_path() . "/asset-gambar/$chefs->gambar");
        
        $chefs->delete();

        return redirect()->route('admin.chef.index')->with('success', 'Data behasil dihapus!');
    }
}