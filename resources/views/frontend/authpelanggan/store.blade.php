<div class="slick3 gallery-lb">
    <div class="row">
      @foreach ($data as $item)
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="{{route('StoreDetail.show', $item->id)}}">
            <h3 class="text-dark"><a href="{{route('StoreDetail.show', $item->id)}}">Nama Obat:</strong> {{ $item->nama_obat }}</a></h3>
          <span class="stext-105 cl3">
            Harga Jual:</strong> Rp{{ number_format($item->harga_jual, 0, ',', '.') }}
          </span>
          <p class="stext-102 cl3 p-t-23">
            @if(strlen($item->deskripsi) > 0)
              {{ substr($item->deskripsi, 0, 50) }}{{ strlen($item->deskripsi) > 50 ? '...' : '' }}
            @else
              <em>Deskripsi tidak tersedia</em>
            @endif
          </p>
          <div>
            @if($item->foto1)
                <img src="{{ asset('storage/'.$item->foto1) }}" alt="Foto 1" width="150">
            @endif
            {{-- @if($item->foto2)
                <img src="{{ asset('storage/'.$item->foto2) }}" alt="Foto 2" width="150">
            @endif
            @if($item->foto3)
                <img src="{{ asset('storage/'.$item->foto3) }}" alt="Foto 3" width="150">
            @endif --}}
        </div>
          {{-- @if ($data)
          {{ $data['id'] }}
          {{ $data['nama'] }}
          @else
              <p>Data tidak ditemukan.</p>
          @endif --}}
        </div>
      @endforeach
      </div>
    </div>
    </div>
    