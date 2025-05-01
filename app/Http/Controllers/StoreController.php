<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\obat;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = obat::all();
        return view('store.index', [
            'title' => 'Store',
            'data' => $data
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            (object)['id' => 1, 'nama' => 'Obat A'],
            (object)['id' => 2, 'nama' => 'Obat B'],
            (object)['id' => 3, 'nama' => 'Obat C']
        ];
        
        return view('frontend.store', [
            'title' => 'Store',
            'data' => $data
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
