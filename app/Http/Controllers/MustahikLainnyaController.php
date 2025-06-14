<?php

namespace App\Http\Controllers;

use App\Models\MustahikLainnya;
use Illuminate\Http\Request;

class MustahikLainnyaController extends Controller
{
    public function index()
    {
        $mustahiks = MustahikLainnya::all();
        return view('mustahiklainnya.index', compact('mustahiks'));
    }

    public function create()
    {
        return view('mustahiklainnya.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required|in:amilin,fisabilillah,mualaf,ibnu sabil',
            'hak' => 'required|numeric|min:0',
        ]);

        MustahikLainnya::create($request->all());

        return redirect()->route('mustahiklainnya.index')
            ->with('success', 'Mustahik Lainnya berhasil ditambahkan.');
    }

    public function show($id)
    {
        $mustahik = MustahikLainnya::findOrFail($id);
        return view('mustahiklainnya.show', compact('mustahik'));
    }

    public function edit($id)
    {
        $mustahik = MustahikLainnya::findOrFail($id);
        return view('mustahiklainnya.edit', compact('mustahik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required|in:amilin,fisabilillah,mualaf,ibnu sabil',
            'hak' => 'required|numeric|min:0',
        ]);

        $mustahik = MustahikLainnya::findOrFail($id);
        $mustahik->update($request->all());

        return redirect()->route('mustahiklainnya.index')
            ->with('success', 'Mustahik Lainnya berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mustahik = MustahikLainnya::findOrFail($id);
        $mustahik->delete();

        return redirect()->route('mustahiklainnya.index')
            ->with('success', 'Mustahik Lainnya berhasil dihapus.');
    }
} 