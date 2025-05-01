<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Obat::all();
        $jenis_obat = JenisObat::all(); // <== ini penting!

        return view('obat.index', compact('datas', 'jenis_obat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obat.create', [
            'title' => 'Obat',
            'menu' => 'Obat',
            'datas' => Obat::all(),
            'jenis_obat' => \App\Models\JenisObat::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_obat' => 'required|string|max:100|unique:obat',
        //     'idjenis' => 'required|exists:jenis_obat,id',
        //     'harga_jual' => 'required|integer|min:0',
        //     'deskripsi_obat' => 'nullable|string|max:255',
        //     'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'stok' => 'required|integer|min:0',
        // ]);

        // DB::beginTransaction();
        // try {
        //     $data = $request->only([
        //         'nama_obat', 'idjenis', 'harga_jual', 'deskripsi_obat', 'stok'
        //     ]);

        //     // Handle file uploads
        //     if($request->hasFile('foto1')) {
        //         $data['foto1'] = $request->file('foto1')->store('obat', 'public');
        //     }
        //     if($request->hasFile('foto2')) {
        //         $data['foto2'] = $request->file('foto2')->store('obat', 'public');
        //     }
        //     if($request->hasFile('foto3')) {
        //         $data['foto3'] = $request->file('foto3')->store('obat', 'public');
        //     }

        //     Obat::create($data);
        //     DB::commit();

        //     return redirect()->route('obat.index')
        //         ->with('sukses', 'Data obat berhasil disimpan');
                
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return redirect()->back()
        //         ->with('error', 'Gagal menyimpan data: ' . $e->getMessage())
        //         ->withInput();
        // }
        // Validasi data
        Log::info('ID Jenis yang dikirim: ' . $request->idjenis);
        $request->validate([
            'nama_obat' => 'required|string|max:100',
            'idjenis' => 'required|exists:jenis_obat,id',
            'harga_jual' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stok' => 'required|integer',
        ]);
        

        // Simpan data ke database
        $data = $request->all();

        // Upload foto jika ada
        if ($request->hasFile('foto1')) {
            $data['foto1'] = $request->file('foto1')->store('obat', 'public');
        }
        if ($request->hasFile('foto2')) {
            $data['foto2'] = $request->file('foto2')->store('obat', 'public');
        }
        if ($request->hasFile('foto3')) {
            $data['foto3'] = $request->file('foto3')->store('obat', 'public');
        }

        Obat::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('Obat.index')->with('sukses', 'Data obat berhasil disimpan.');
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
        // return view('obat.edit', [
        //     'title' => 'Obat',
        //     'menu' => 'Obat',
        //     'datas' => Obat::all()
        // ]);
        $obat = Obat::findOrFail($id); // atau model kamu
        $jenis_obat = JenisObat::all(); // <- tambahkan baris ini
        return view('obat.edit', compact('obat', 'jenis_obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:100',
            'idjenis' => 'required|exists:jenis_obat,id',
            'harga_jual' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stok' => 'required|integer',
        ]);
    
        $obat = Obat::findOrFail($id);
        $data = $request->all();
    
        // Handle file uploads
        if ($request->hasFile('foto1')) {
            if ($obat->foto1) Storage::delete('public/' . $obat->foto1);
            $data['foto1'] = $request->file('foto1')->store('obat', 'public');
        }
        if ($request->hasFile('foto2')) {
            if ($obat->foto2) Storage::delete('public/' . $obat->foto2);
            $data['foto2'] = $request->file('foto2')->store('obat', 'public');
        }
        if ($request->hasFile('foto3')) {
            if ($obat->foto3) Storage::delete('public/' . $obat->foto3);
            $data['foto3'] = $request->file('foto3')->store('obat', 'public');
        }
    
        $obat->update($data);
    
        return redirect()->route('Obat.index')->with('sukses', 'Data obat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $obat = Obat::findOrFail($id);
            Log::info('Data ditemukan: ' . json_encode($obat));
    
            // Delete associated files
            if ($obat->foto1) {
                Log::info('Menghapus foto1: ' . $obat->foto1);
                Storage::delete('public/' . $obat->foto1);
            }
            if ($obat->foto2) {
                Log::info('Menghapus foto2: ' . $obat->foto2);
                Storage::delete('public/' . $obat->foto2);
            }
            if ($obat->foto3) {
                Log::info('Menghapus foto3: ' . $obat->foto3);
                Storage::delete('public/' . $obat->foto3);
            }
    
            $obat->delete();
            DB::commit();
    
            return redirect()->route('obat.index')
                ->with('sukses', 'Data obat berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal menghapus data: ' . $e->getMessage());
            return redirect()->route('jenis_obat.index')->with('pesan', 'Data berhasil dihapus!');
        }
    }
}
