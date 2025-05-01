<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodeBayar;

class MetodeBayarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metodes = MetodeBayar::all();
        return view('admin.metode_bayar.index', compact('metodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.metode_bayar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string|max:50',
            'tempat_bayar' => 'nullable|string|max:50',
            'no_rekening' => 'nullable|string|max:25',
            'url_logo' => 'nullable|string|max:255',
        ]);

        MetodeBayar::create($request->all());
        return redirect()->route('metode_bayar.index')->with('success', 'Metode pembayaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $metode = MetodeBayar::findOrFail($id);
        return view('admin.metode_bayar.edit', compact('metode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string|max:50',
            'tempat_bayar' => 'nullable|string|max:50',
            'no_rekening' => 'nullable|string|max:25',
            'url_logo' => 'nullable|string|max:255',
        ]);

        $metode = MetodeBayar::findOrFail($id);
        $metode->update($request->all());
        return redirect()->route('metode_bayar.index')->with('success', 'Metode pembayaran berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
