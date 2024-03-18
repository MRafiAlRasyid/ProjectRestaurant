<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class menuController extends Controller
{
    public function index(Request $request) {
        $menus = menu::all();
        $menusCount = menu::count();
        return view('admin.menu.index', compact('menus'));
    }

    public function create() {
        // 
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_makanan' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'image' => 'required',
        ]);

        $imageName = $request->file('image')->hashName();
        $validated['image'] = $imageName;
        $menusDirectory = public_path() . '/asset-gambar';
        $request->file('image')->move($menusDirectory, $imageName);

        menu::create($validated);
        return redirect()->route('admin.menu.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(String $id) {
        $menus = menu::find($id);
        return view('admin.menu.editMenu', compact('menus'));
    }

    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'nama_makanan' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'image' => 'required',
        ]);
        
        $menus = menu::find($id);

        File::delete(public_path() . "/asset-gambar/$menus->image");

        $imageName = $request->file('image')->hashName();
        $validated['image'] = $imageName;
        $menusDirectory = public_path() . '/asset-gambar';
        $request->file('image')->move($menusDirectory, $imageName);
        $menus->update($validated);

        return redirect()->route('admin.menu.index')->with('success', 'Data berhasil diedit!');
    }

    public function delete(string $id) {
        $menus = menu::find($id);

        File::delete(public_path() . "/asset-gambar/$menus->image");
        
        $menus->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Data behasil dihapus!');
    }
}