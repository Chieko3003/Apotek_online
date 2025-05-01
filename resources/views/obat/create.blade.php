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
						<div class="col-auto me-auto mb-4 h4">Stok Obat</div>
					</div>
					<div>
						<form action="{{ route('Obat.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="mb-3">
								<label for="nama_obat" class="form-label">Nama Obat</label>
								<input class="form-control" name="nama_obat" id="nama_obat" maxlength="100" type="text"
									aria-label="default input example">
							</div>
						
							<div class="mb-3">
								<label for="idjenis" class="form-label">Jenis Obat</label>
								<select name="idjenis" class="form-control">
									<option value="">Pilih Jenis Obat</option>
									@foreach ($jenis_obat as $jenisobt)
										<option value="{{ $jenisobt->id }}">{{ $jenisobt->jenis }}</option>
									@endforeach
								</select>
								@error('idjenis')
									  <div class="text-danger">{{ $message }}</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="harga_jual" class="form-label">Harga Jual</label>
								<input class="form-control" type="number" name="harga_jual" id="harga_jual" maxlength="100"
									aria-label="default input example">
							</div>
						
							<div class="mb-3">
								<label for="deskripsi" class="form-label">Deskripsi</label>
								<textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
								@error('deskripsi')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						
							<div class="mb-3">
								<label for="foto1" class="form-label">Foto 1</label>
								<input class="form-control" type="file" name="foto1" id="foto1" accept="image/*">
								@error('foto1')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="foto2" class="form-label">Foto 2</label>
								<input class="form-control" type="file" name="foto2" id="foto2" accept="image/*">
								@error('foto2')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="foto3" class="form-label">Foto 3</label>
								<input class="form-control" type="file" name="foto3" id="foto3" accept="image/*">
								@error('foto3')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="stok" class="form-label">Stok Obat</label>
								<input class="form-control" type="number" name="stok" id="stok" maxlength="100"
									aria-label="default input example">
							</div>
						
							<div class="text-end">
								<a href="{{route('Obat.index')}}" class="btn btn-secondary">
									<i class="fas fa-window-close me-2"></i>Cancel</a>
								<button type="submit" class="btn btn-primary"><i class="--bs-success"></i>Simpan Stok baru</button>
							</div>
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

