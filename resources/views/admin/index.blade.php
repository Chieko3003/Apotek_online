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
                  
                  <div class="row align-items-center">
                    <div class="col-8">
                     
                      <div class="d-flex align-items-center mb-3">
                        
                      
                      </div>
                      <div class="d-flex align-items-center">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="d-flex justify-content-center">
                        <div id="breakup"></div>
                      </div>
                    </div>
                    <div class="bg-light rounded h-100 p-4">
          
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Nama Obat</th>
                                      <th scope="col">Jenis Obat</th>
                                  </tr>
                              </thead>
                                {{-- <tbody>
                                  @foreach ($obats as $index => $obat)
                                  <tr>
                                      <td>{{ $index + 1 }}</td>
                                      <td>{{ $obat->nama_obat }}</td>
                                      <td>{{ $obat->jenis_obat }}</td>
                                  </tr>
                              @endforeach
                                </tbody> --}}
                          </table>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
        <!-- Monthly Earnings -->
        
        
@endsection
