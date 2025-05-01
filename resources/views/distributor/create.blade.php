

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
                    <div class="col-auto me-auto mb-4 h4">Tambah Distributor</div>
                        <form action="{{ route('distributor.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label>Nama Distributor</label>
                                <input type="text" name="nama_distributor" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label>Telepon</label>
                                <input type="text" name="telepon" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('distributor.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
{{-- @section('script') --}}