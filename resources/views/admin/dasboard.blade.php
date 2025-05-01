@extends('backend.master')
@section('sidebar')
	@include('backend.sidebar')
@endsection
@section('title', 'Admin')
@section('navbar')
	@include('backend.navbar')
@endsection

@section('content')
              <!-- Yearly Breakup -->
    <div class="card overflow-hidden">
      <div class="card-body p-4">
          <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
          <div class="row align-items-center">
              <div class="col-8">
                  <h4 class="fw-semibold mb-3">$36,358</h4>
                  <div class="d-flex align-items-center mb-3">
                      <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                          <i class="ti ti-arrow-up-left text-success"></i>
                      </span>
                      <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                      <p class="fs-3 mb-0">last year</p>
                  </div>
                  <div class="d-flex align-items-center">
                      <div class="me-4">
                          <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">2023</span>
                      </div>
                      <div>
                          <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                          <span class="fs-2">2023</span>
                      </div>
                  </div>
              </div>
              <div class="col-4">
                  <div class="d-flex justify-content-center">
                      <div id="breakup"></div>
                  </div>
              </div>
              <div class="bg-light rounded h-100 p-4">
                  <div class="row mb-5">
                      {{-- Optional Section --}}
                  </div>
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Obat</th>
                                  <th scope="col">Jenis Obat</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($obats as $index => $obat)
                              <tr>
                                  <td>{{ $index + 1 }}</td>
                                  <td>{{ $obat->nama_obat }}</td>
                                  <td>{{ $obat->jenis_obat }}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
