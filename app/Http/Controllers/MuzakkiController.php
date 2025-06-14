<?php

namespace App\Http\Controllers;

use App\Models\Muzakki;
use Illuminate\Http\Request;

class MuzakkiController extends Controller
{
    public function index()
    {
        $muzakkis = Muzakki::all();
        return view('muzakki.index', compact('muzakkis'));
    }

    public function create()
    {
        return view('muzakki.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_muzakki' => 'required',
            'jumlah_tanggungan' => 'required|numeric|min:1',
            'keterangan' => 'nullable'
        ]);

        Muzakki::create($request->all());

        return redirect()->route('muzakki.index')
            ->with('success', 'Muzakki berhasil ditambahkan.');
    }

    public function show($id)
    {
        $muzakki = Muzakki::findOrFail($id);
        return view('muzakki.show', compact('muzakki'));
    }

    public function edit($id)
    {
        $muzakki = Muzakki::findOrFail($id);
        return view('muzakki.edit', compact('muzakki'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_muzakki' => 'required',
            'jumlah_tanggungan' => 'required|numeric|min:1',
            'keterangan' => 'nullable'
        ]);

        $muzakki = Muzakki::findOrFail($id);
        $muzakki->update($request->all());

        return redirect()->route('muzakki.index')
            ->with('success', 'Muzakki berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $muzakki = Muzakki::findOrFail($id);
        $muzakki->delete();

        return redirect()->route('muzakki.index')
            ->with('success', 'Muzakki berhasil dihapus.');
    }
} 