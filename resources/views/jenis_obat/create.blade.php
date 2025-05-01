@extends('backend.master')
@section('sidebar')
	@include('backend.sidebar')
@endsection
@section('title', 'Stok Obat')
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
						<div class="col-auto me-auto mb-4 h4">Tambah Jenis Obat</div>
					</div>

					@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
					@if(session('pesan'))
						<div class="alert alert-success">
							{{ session('pesan') }}
						</div>
					@endif

					<div>
						
						<form action="{{ route('jenis_obat.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="mb-3">
								<label for="jenis" class="form-label">Jenis</label>
								<input type="text" name="jenis" id="jenis" class="form-control" value="{{ old('jenis') }}" required>
							</div>
						
							<div class="mb-3">
								<label for="deskripsi_jenis" class="form-label">Deskripsi</label>
								<textarea name="deskripsi_jenis" id="deskripsi_jenis" class="form-control">{{ old('deskripsi_jenis') }}</textarea>
							</div>

							<div class="mb-3">
								<label for="image_url" class="form-label">Gambar (opsional)</label>
								<input type="file" name="image_url" id="image_url" class="form-control">
							</div>
						
							<a href="{{ route('jenis_obat.index') }}" class="btn btn-secondary">Kembali</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</form>
					</div>
          {{-- </div> --}}
        </div>
    <div class="col-lg-12">
		<!-- <div id="status" class="invisible" >@isset($status) {{$status}} @endisset</div> -->
<div id="pesan" class="invisible">@isset($pesan) {{$pesan}} @endisset</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const pesan = document.getElementById('pesan');
    
    function tampil_pesan() {
        if (pesan && pesan.innerHTML.trim() !== '') {
            if (typeof swal === 'function') {
                swal('Pesan', pesan.innerHTML, 'info');
            } else {
                alert(pesan.innerHTML);
            }
        }
    }

    tampil_pesan();
});
</script>
                <!-- Monthly Earnings -->
@endsection

