<?php

namespace App\Http\Controllers;

use App\Models\tables;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index(){
        $tables = tables::all();
        $tablesCount = tables::count();
        return view('admin.tables.index', compact('tables', 'tablesCount'));
    }

    public function create(){
        return view('admin.tables.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_meja' => 'required',
        ]);

        tables::create($validated);
        return redirect()->route('admin.tables.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(String $id) {
        $tables = tables::find($id);
        return view('admin.tables.edit', compact('tables'));
    }

    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'nama_meja' => 'required',
        ]);
        
        $tables = tables::find($id);

        $tables->update($validated);

        return redirect()->route('admin.tables.index')->with('success', 'Data berhasil diedit!');
    }

    public function delete(string $id) {
        $tables = tables::find($id);

        $tables->delete();

        return redirect()->route('admin.tables.index')->with('success', 'Data behasil dihapus!');
    }
}