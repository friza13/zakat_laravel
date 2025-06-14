<?php

namespace App\Http\Controllers;

use App\Models\MustahikWarga;
use Illuminate\Http\Request;

class MustahikWargaController extends Controller
{
    public function index()
    {
        $mustahiks = MustahikWarga::all();
        return view('mustahikwarga.index', compact('mustahiks'));
    }

    public function create()
    {
        return view('mustahikwarga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required|in:fakir,miskin,mampu',
            'hak' => 'required|numeric|min:0',
        ]);

        MustahikWarga::create($request->all());

        return redirect()->route('mustahikwarga.index')
            ->with('success', 'Mustahik Warga berhasil ditambahkan.');
    }

    public function show($id)
    {
        $mustahik = MustahikWarga::findOrFail($id);
        return view('mustahikwarga.show', compact('mustahik'));
    }

    public function edit($id)
    {
        $mustahik = MustahikWarga::findOrFail($id);
        return view('mustahikwarga.edit', compact('mustahik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required|in:fakir,miskin,mampu',
            'hak' => 'required|numeric|min:0',
        ]);

        $mustahik = MustahikWarga::findOrFail($id);
        $mustahik->update($request->all());

        return redirect()->route('mustahikwarga.index')
            ->with('success', 'Mustahik Warga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mustahik = MustahikWarga::findOrFail($id);
        $mustahik->delete();

        return redirect()->route('mustahikwarga.index')
            ->with('success', 'Mustahik Warga berhasil dihapus.');
    }
} 