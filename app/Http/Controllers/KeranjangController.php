<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Keranjang::all();
        return response()->json($data);
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
        $request->validate([
            'id_pelanggan' => 'required|integer',
            'id_obat' => 'required|integer',
            'jumlah_order' => 'required|numeric',
            'harga' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        $keranjang = Keranjang::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_obat' => $request->id_obat,
            'jumlah_order' => $request->jumlah_order,
            'harga' => $request->harga,
            'subtotal' => $request->subtotal,
        ]);

        return response()->json($keranjang, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $keranjang = Keranjang::findOrFail($id);
        return response()->json($keranjang);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $keranjang = Keranjang::findOrFail($id);

        $keranjang->update($request->only([
            'id_pelanggan', 'id_obat', 'jumlah_order', 'harga', 'subtotal'
        ]));

        return response()->json($keranjang);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();

        return response()->json(['pesan' => 'keranjang ini berhasil dihapus']);
    }
}
