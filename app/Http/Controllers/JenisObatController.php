<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use Illuminate\Http\Request;

class JenisObatController extends Controller
{
    public function index()
    {
        $data = JenisObat::all();
        // return view('jenis_obat.index', compact('data'));
        return view('jenis_obat.index', compact('data'));
    }

    public function create()
    {
        return view('jenis_obat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|string|max:50',
            'deskripsi_jenis' => 'nullable|string|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            $validated['image_url'] = $request->file('image_url')->store('jenis_obat', 'public');
        }

        JenisObat::create($validated);

        return redirect()->route('jenis_obat.index')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $data = JenisObat::findOrFail($id);
        
        if ($data->image_url) {
            \Storage::delete('public/' . $data->image_url);
        }

        $data->delete();

        return redirect()->route('jenis_obat.index')->with('pesan', 'Data berhasil dihapus!');
    }
}
