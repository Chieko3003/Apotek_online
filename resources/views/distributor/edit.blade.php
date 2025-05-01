{{-- <form action="{{ route('distributor.update', $distributor->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-2">
        <label>Nama Distributor</label>
        <input type="text" name="nama_distributor" class="form-control" value="{{ $distributor->nama_distributor }}" required>
    </div>
    <div class="form-group mb-2">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ $distributor->telepon }}" required>
    </div>
    <div class="form-group mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required>{{ $distributor->alamat }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('distributor.index') }}" class="btn btn-secondary">Batal</a>
</form> --}}

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
                    <form action="{{ route('distributor.update', $distributor->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label>Nama Distributor</label>
                            <input type="text" name="nama_distributor" class="form-control" value="{{ $distributor->nama_distributor }}" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Telepon</label>
                            <input type="text" name="telepon" class="form-control" value="{{ $distributor->telepon }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" required>{{ $distributor->alamat }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('distributor.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif  
            </div>
        </div>
    {{-- </div> --}}
</div>
</div>
</div>
</div>

        <!-- Monthly Earnings -->
@endsection
