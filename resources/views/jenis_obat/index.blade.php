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
                    <div class="col-auto me-auto mb-4 h4">Jenis Obat</div>

                @if(session('pesan'))
                    <div class="alert alert-success">
                        {{ session('pesan') }}
                    </div>
                @endif

                <a href="{{ route('jenis_obat.create') }}" class="btn btn-primary mb-3">Tambah Jenis Obat</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Jenis</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->deskripsi_jenis }}</td>
                            <td>
                                @if($item->image_url)
                                    <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->jenis }}" width="100">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('jenis_obat.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
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
