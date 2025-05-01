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

                <a href="{{ route('distributor.create') }}" class="btn btn-primary mb-3">Tambah Distributor</a>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($distributors as $distributor)
                            <tr>
                                <td>{{ $distributor->nama_distributor }}</td>
                                <td>{{ $distributor->telepon }}</td>
                                <td>{{ $distributor->alamat }}</td>
                                <td>
                                    <a href="{{ route('distributor.edit', $distributor->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('distributor.destroy', $distributor->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
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
