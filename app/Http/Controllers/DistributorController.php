<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    // Tampilkan semua distributor
    public function index()
    {
        $distributors = Distributor::all();
        return view('distributor.index', compact('distributors'));
    }

    // Tampilkan form tambah distributor
    public function create()
    {
        return view('distributor.create');
    }

    // Simpan distributor baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:50',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        Distributor::create($request->all());

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil ditambahkan');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('distributor.edit', compact('distributor'));
    }

    // Update data distributor
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:50',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil diupdate');
    }

    // Hapus distributor
    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil dihapus');
    }
}
