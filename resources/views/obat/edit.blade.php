@extends('backend.master')

@section('sidebar')
    @include('backend.sidebar')
@endsection

@section('title', 'Edit Obat')

@section('navbar')
    @include('backend.navbar')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="mb-4">Edit Obat</h4>
                <form action="{{ route('Obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_obat" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="idjenis" class="form-label">Jenis Obat</label>
                        <select class="form-select" id="idjenis" name="idjenis" required>
                            <option value="" disabled>Pilih Jenis Obat</option>
                            @foreach($jenis_obat as $jenis)
                                <option value="{{ $jenis->id }}" {{ old('idjenis', $obat->idjenis) == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="harga_jual" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $obat->harga_jual) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $obat->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto1" class="form-label">Foto 1</label>
                        @if($obat->foto1)
                            <img src="{{ asset('storage/' . $obat->foto1) }}" alt="Foto 1" class="img-thumbnail mb-2" width="150">
                        @endif
                        <input type="file" class="form-control" id="foto1" name="foto1" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="foto2" class="form-label">Foto 2</label>
                        @if($obat->foto2)
                            <img src="{{ asset('storage/' . $obat->foto2) }}" alt="Foto 2" class="img-thumbnail mb-2" width="150">
                        @endif
                        <input type="file" class="form-control" id="foto2" name="foto2" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="foto3" class="form-label">Foto 3</label>
                        @if($obat->foto3)
                            <img src="{{ asset('storage/' . $obat->foto3) }}" alt="Foto 3" class="img-thumbnail mb-2" width="150">
                        @endif
                        <input type="file" class="form-control" id="foto3" name="foto3" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $obat->stok) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('Obat.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection