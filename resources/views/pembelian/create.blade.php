@extends('backend.master')

@section('sidebar')
    @include('backend.sidebar')
@endsection

@section('title', 'Tambah Pembelian')

@section('navbar')
    @include('backend.navbar')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="mb-4">Tambah Data Pembelian</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pembelian.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nonota" class="form-label">No Nota</label>
                        <input type="text" name="nonota" id="nonota" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_pembelian" class="form-label">Tanggal Pembelian</label>
                        <input type="date" name="tgl_pembelian" id="tgl_pembelian" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_bayar" class="form-label">Total Bayar</label>
                        <input type="number" name="total_bayar" id="total_bayar" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_distributor" class="form-label">Distributor</label>
                        <select name="id_distributor" id="id_distributor" class="form-control" required>
                            <option value="">-- Pilih Distributor --</option>
                            @foreach ($distributor as $d)
                                <option value="{{ $d->id }}">{{ $d->nama_distributor }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Kembali</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

