@extends('backend.master')
@section('sidebar')
	@include('backend.sidebar')
@endsection
@section('title', 'Obat')
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
						@if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    	@endif
						<div class="col-auto">
						<a href="{{ route('Obat.create') }}" class="btn btn-primary m-2 justify-content-end">
							<i class="fab fa-cc-visa text-right me-2"></i>Stok Obat Baru</a> 
						</div>
					</div>
					<div class="mb-3">
						<input type="text" id="searchInput" class="form-control" placeholder="Search Obat.....">
					</div>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Nama Obat</th>
									<th scope="col">Jenis Obat</th>
									<th scope="col">Harga Jual</th>
									<th scope="col">Description</th>
                                    <th scope="col">Foto1</th>
									<th scope="col">Foto2</th>
									<th scope="col">Foto3</th>
									<th scope="col">Stok</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($datas as $no => $data)
								<tr>
									<td>
										<div class="btn-group" role="group">
											<a href="{{ route('Obat.edit', $data) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>
											Edit</a>
											<form action="{{ route('Obat.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm">
													<i class="fas fa-trash-alt me-2"></i>Delete
												</button>
											</form>
										</div>
									</td>
								</tr>
								<th scope="row">{{ $no + 1 . "." }}</th>

								@if(strlen($data['nama_obat']) > 10)
								<td  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title= "{{ $data['nama_obat']}}">
									 {{substr($data['nama_obat'], 0, 10) . ' ....'}}
								</td>
								@else
								<td>{{ $data['nama_obat'] }}</td>
								@endif

								<td>{{ $data->jenisObat->jenis ?? '-' }}</td>
								

								@if(strlen($data['harga_jual']) > 10)
								<td  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title= "{{ $data['harga_jual']}}">
									 {{substr($data['harga_jual'], 0, 10) . ' ....'}}
								</td>
								@else
								<td>{{ $data['harga_jual'] }}</td>
								@endif

								@if(strlen($data['deskripsi']) > 10)
								<td  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title= "{{ $data['deskripsi']}}">
									 {{substr($data['deskripsi'], 0, 10) . ' ....'}}
								</td>
								@else
								<td>{{ $data['deskripsi'] }}</td>
								@endif

								<td>
									@if($data['foto1'] !== '')
									<img src="storage/{{$data['foto1']}}" alt="" class="w-100 img-thumbnail cur-pointer"
									data-bs-toggle="modal" data-bs-target="#foto1_{{$data->id}}">
									@endif
								</td>

								<td>
									@if($data['foto2'] !== '')
									<img src="storage/{{$data['foto2']}}" alt="" class="w-100 img-thumbnail cur-pointer"
									data-bs-toggle="modal" data-bs-target="#foto2_{{$data->id}}">
									@endif
								</td>

								<td>
									@if($data['foto3'] !== '')
									<img src="storage/{{$data['foto3']}}" alt="" class="w-100 img-thumbnail cur-pointer"
									data-bs-toggle="modal" data-bs-target="#foto3_{{$data->id}}">
									@endif
								</td>

								<td>{{ $data['stok'] }}</td>
								@endforeach
							</tbody>
						</table>
					</div>
          {{-- </div> --}}
        </div>
    <div class="col-lg-12">
                <!-- Monthly Earnings -->

				<!-- <div id="status" class="invisible">@isset($status) {{$status}} @endisset</div> -->
				<div id="pesan"  class="invisible" >@isset($pesan) {{$pesan}} @endisset</div>

				<script>
					const body = document.getElementById('body')
					const status = document.getElementById('status')
					const pesan = document.getElementById('pesan')
					const form = document.getElementById('frmHapus')
	
					function tampil_pesan(){
						let pesan = "{{session('pesan')}}"
						// alert(tampil_pesan)
						if(pesan.trim() !== ''){
						swal('Good Job', pesan.trim(), 'success')
					}
					}
					
					function hapus(event, el){
						event.preventDefault()
						swal({
							title: "Are you sure?",
							text: "Your will delete the Cothe data permanently!",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-danger",
							confirmButtonText: "Yes, delete it!",
							closeOnConfirm: false
							},
					function(){
						form.setAttribute('action', el.getAttribute('href'))
						form.submit()
						});
					
					}
					// function openModal(imageSrc) {
					//     const modalImage = document.getElementById('modalImage');
					//     modalImage.src = imageSrc;
					//     const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
					//     imageModal.show();
					// }
	
	
					body.onload = function(){
						tampil_pesan()
					}
	
				</script>
				<script>
					document.getElementById('searchInput').addEventListener('keyup', function() {
						var input = this.value.toLowerCase();
						var rows = document.querySelectorAll('table tbody tr');
						
						rows.forEach(function(row) {
							var cells = row.getElementsByTagName('td');
							var found = false;
							
							for (var i = 0; i < cells.length; i++) {
								if (cells[i].textContent.toLowerCase().includes(input)) {
									found = true;
									break;
								}
							}
							
							row.style.display = found ? '' : 'none';
						});
					});
				</script>
@endsection

