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

                    <a href="{{ route('pembelian.create') }}" class="btn btn-primary mb-3">Tambah Pembelian</a>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>NoNota</th>
                            <th>Tanggal</th>
                            <th>Total Bayar</th>
                            <th>Distributor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $p)
                        <tr>
                            <td>{{ $p->nonota }}</td>
                            <td>{{ $p->tgl_pembelian }}</td>
                            <td>Rp{{ number_format($p->total_bayar, 0, ',', '.') }}</td>
                            <td>{{ $p->distributor->nama_distributor }}</td>
                            <td>
                                <a href="{{ route('pembelian.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pembelian.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    {{-- </div> --}}
</div>
<div class="col-lg-12">

        <!-- Monthly Earnings -->
@endsection

