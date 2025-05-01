@extends('backend.master')
@section('sidebar')
	@include('backend.sidebar')
@endsection
@section('title', 'Jenis Obat')
@section('navbar')
	@include('backend.navbar')
@endsection

@section('content')

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      {{-- <div class="col-lg-8 d-flex align-items-strech"> --}}
        <div class="card w-100">
          <div class="card-body">
            {{-- <div class="d-sm-flex d-block align-items-center justify-content-between mb-9"> --}}
                <div class="row mb-5">
                    <div class="mb-3">
                        <label>No Nota</label>
                        <input type="text" name="nonota" class="form-control" value="{{ isset($p) ? $p->nonota : '' }}" required>
                    </div>  
                    <div class="mb-3">
                        <label>Tanggal Pembelian</label>
                        <input type="date" name="tgl_pembelian" class="form-control" value="{{ old('tgl_pembelian', $pembelian->tgl_pembelian ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Total Bayar</label>
                        <input type="number" name="total_bayar" class="form-control" value="{{ old('total_bayar', $pembelian->total_bayar ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Distributor</label>
                        <select name="id_distributor" class="form-control" required>
                            <option value="">-- Pilih Distributor --</option>
                            @foreach ($distributor as $d)
                                <option value="{{ $d->id }}"
                                    {{ isset($p) && $p->id_distributor == $d->id ? 'selected' : '' }}>
                                    {{ $d->nama_distributor }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</div>
<div class="col-lg-12">

        <!-- Monthly Earnings -->
@endsection