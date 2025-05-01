@extends('backend.master')
@section('sidebar')
	@include('backend.sidebar')
@endsection
@section('title', 'detail penjualan')
@section('navbar')
	@include('backend.navbar')

                <div class="container-fluid">
                    <!--  Row 1 -->
                    <div class="row">
                      {{-- <div class="col-lg-8 d-flex align-items-strech"> --}}
                        <div class="card w-100">
                          <div class="card-body">
                            {{-- <div class="d-sm-flex d-block align-items-center justify-content-between mb-9"> --}}
                                <div class="row mb-5">
                                    <div class="col-auto me-auto mb-4 h4">Detail Pembelian</div>
                
                                {{-- @if(session('pesan'))
                                    <div class="alert alert-success">
                                        {{ session('pesan') }}
                                    </div>
                                @endif --}}
                
                                {{-- <a href="{{ route('jenis_obat.create') }}" class="btn btn-primary mb-3">Tambah Jenis Obat</a> --}}
    
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Penjualan</th>
                                            <th>Obat</th>
                                            <th>Jumlah</th>
                                            <th>Harga Beli</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($data as $item)
                                            <tr>
                                                <td>{{ $detail->id }}</td>
                                                <td>{{ $detail->obat->nama_obat }}</td>
                                                <td>{{ $detail->jumlah_beli }}</td>
                                                <td>Rp{{ number_format($detail->harga_beli, 0, ',', '.') }}</td>
                                                <td>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data detail pembelian</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
                <div class="col-lg-12">
@endsection

