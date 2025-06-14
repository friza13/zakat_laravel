<?php

namespace App\Http\Controllers;

use App\Models\BayarZakat;
use App\Models\Muzakki;
use Illuminate\Http\Request;

class BayarZakatController extends Controller
{
    public function index()
    {
        $zakatList = BayarZakat::with('muzakki')->get();
        return view('bayarzakat.index', compact('zakatList'));
    }

    public function create()
    {
        $muzakkis = Muzakki::all();
        return view('bayarzakat.create', compact('muzakkis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_muzakki' => 'required|exists:muzakki,id_muzakki',
            'nama_KK' => 'required',
            'jumlah_tanggungan' => 'required|numeric|min:1',
            'jenis_bayar' => 'required|in:beras,uang',
            'jumlah_tanggunganyangdibayar' => 'required|numeric|min:1',
            'bayar_beras' => 'nullable|numeric|min:0',
            'bayar_uang' => 'nullable|numeric|min:0',
        ]);

        $data = $request->all();
        
        if ($request->jenis_bayar == 'beras') {
            $data['bayar_uang'] = null;
            $data['bayar_beras'] = $request->bayar_beras;
        } else {
            $data['bayar_beras'] = null;
            $data['bayar_uang'] = $request->bayar_uang;
        }

        BayarZakat::create($data);

        return redirect()->route('bayarzakat.index')
            ->with('success', 'Pembayaran Zakat berhasil ditambahkan.');
    }

    public function show($id)
    {
        $zakat = BayarZakat::with('muzakki')->findOrFail($id);
        return view('bayarzakat.show', compact('zakat'));
    }

    public function edit($id)
    {
        $zakat = BayarZakat::findOrFail($id);
        $muzakkis = Muzakki::all();
        return view('bayarzakat.edit', compact('zakat', 'muzakkis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_muzakki' => 'required|exists:muzakki,id_muzakki',
            'nama_KK' => 'required',
            'jumlah_tanggungan' => 'required|numeric|min:1',
            'jenis_bayar' => 'required|in:beras,uang',
            'jumlah_tanggunganyangdibayar' => 'required|numeric|min:1',
            'bayar_beras' => 'nullable|numeric|min:0',
            'bayar_uang' => 'nullable|numeric|min:0',
        ]);

        $zakat = BayarZakat::findOrFail($id);
        $data = $request->all();
        
        if ($request->jenis_bayar == 'beras') {
            $data['bayar_uang'] = null;
            $data['bayar_beras'] = $request->bayar_beras;
        } else {
            $data['bayar_beras'] = null;
            $data['bayar_uang'] = $request->bayar_uang;
        }

        $zakat->update($data);

        return redirect()->route('bayarzakat.index')
            ->with('success', 'Pembayaran Zakat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $zakat = BayarZakat::findOrFail($id);
        $zakat->delete();

        return redirect()->route('bayarzakat.index')
            ->with('success', 'Pembayaran Zakat berhasil dihapus.');
    }
} 