<?php

namespace App\Http\Controllers;

use App\Models\KategoriMustahik;
use Illuminate\Http\Request;

class KategoriMustahikController extends Controller
{
    public function index()
    {
        $kategoris = KategoriMustahik::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'jumlah_hak' => 'required|numeric|min:0'
        ]);

        KategoriMustahik::create($request->all());

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori Mustahik berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kategori = KategoriMustahik::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = KategoriMustahik::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'jumlah_hak' => 'required|numeric|min:0'
        ]);

        $kategori = KategoriMustahik::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori Mustahik berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = KategoriMustahik::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori Mustahik berhasil dihapus.');
    }
} 