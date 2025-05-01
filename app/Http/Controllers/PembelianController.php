<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Distributor;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    // Tampilkan semua pembelian
    public function index()
    {
        $data = \App\Models\Pembelian::with('distributor')->orderBy('created_at', 'desc')->get();
        return view('pembelian.index', compact('data'));
    }

    // Form tambah pembelian
    public function create()
    {
        $distributor = Distributor::all(); // Ambil semua distributor dari database
        return view('pembelian.create', compact('distributor'));
    }

    // Simpan data pembelian baru
    public function store(Request $request)
    {
        $request->validate([
            'nonota' => 'required|string|max:100',
            'tgl_pembelian' => 'required|date',
            'total_bayar' => 'required|numeric',
            // 'id_distributor' => 'required|exists:distributor,id',
            'id_distributor' => 'required|exists:distributor,id',


        ]);

        Pembelian::create($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil ditambahkan!');
    }

    // Form edit pembelian
    public function edit(Pembelian $pembelian)
    {
        $distributors = Distributor::all();
        return view('pembelian.edit', compact('pembelian', 'distributor'));
    }

    // Update data pembelian
    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'nonota' => 'required|string|max:100',
            'tgl_pembelian' => 'required|date',
            'total_bayar' => 'required|numeric',
            'id_distributor' => 'required|exists:distributor,id',
        ]);

        $pembelian->update($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil diupdate!');
    }
    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'id_distributor');
    }

    // Hapus pembelian
    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus!');
    }
}

