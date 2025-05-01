<?php

namespace App\Http\Controllers;

use App\Models\DetailPembelian;
use Illuminate\Http\Request;

class DetailPembelianController extends Controller
{
    // Menampilkan semua data detail pembelian
    public function index()
    {
        $data = DetailPembelian::with(['obat', 'pembelian'])->get();
        return view('detailpembelian.index', compact('data'));
    }
    

    // Menyimpan data detail pembelian
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_obat' => 'required|exists:obat,id',
            'jumlah_beli' => 'required|integer|min:1',
            'harga_beli' => 'required|numeric|min:0',
            'id_pembelian' => 'required|exists:pembelian,id',
        ]);

        $detail = DetailPembelian::create($validated);

        return response()->json([
            'message' => 'Detail pembelian berhasil ditambahkan',
            'data' => $detail
        ], 201);
    }

    // Menampilkan detail pembelian berdasarkan ID
    public function show($id)
    {
        $data = DetailPembelian::with(['obat', 'pembelian'])->findOrFail($id);
        return response()->json($data);
    }
}
