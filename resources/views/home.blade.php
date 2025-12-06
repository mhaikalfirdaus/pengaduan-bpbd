@extends('layout')

@section('title', 'Sistem Pengaduan Masyarakat')
@section('content')

  <div class="container mt-5">
    <div class="row mt-5 justify-content-center">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header">
              List Pengaduan
          </div>
          <div class="card-body mx-auto">
            @foreach($model as $pengaduan)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pengaduan->judul_pengaduan }}</h5>
                        <p class="card-text">{{ $pengaduan->isi_laporan }}</p>
                        <img src="{{ asset($pengaduan->foto) }}" class="img-fluid mb-2" alt="Foto Pengaduan">
                        <p class="card-text"><strong>Pengadu:</strong> {{ $pengaduan->masyarakat->username }}</p>
                        <p class="card-text"><strong>Tanggal:</strong> {{ $pengaduan->tanggal_pengaduan }}</p>
                    </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Section Kontak Kami -->
  <section class="contact-info mt-5">
    <div class="container">
      <h2 class="text-center mb-4">Kontak Kami</h2>
      <div class="row">
        <div class="col-md-6">
          <ul class="list-unstyled">
            <li><strong>Alamat:</strong> Jl. Tegar Beriman No. 1 Pakansari - Cibinong</li>
            <li><strong>Telpon:</strong> (021) 879 14900 - Jam Kerja</li>
            <li><strong>Fax:</strong> (021) 879 14800 - Jam Kerja</li>
            <li><strong>Layanan Tanggap Darurat:</strong> 0812 1010 9002 (Whatsapp)</li>
            <li><strong>Layanan Pusat Data dan Informasi:</strong> 0851 7530 9567 (Whatsapp)</li>
            <li><strong>Email:</strong> <a href="mailto:bpbd@bogorkab.go.id">bpbd@bogorkab.go.id</a>, <a href="mailto:bpbdbogor@gmail.com">bpbdbogor@gmail.com</a></li>
            <li><strong>Website:</strong> <a href="http://bpbd.bogorkab.go.id" target="_blank">bpbd.bogorkab.go.id</a></li>
            <li><strong>Informasi Kebencanaan:</strong> Hubungi Pusdatin/Pusdalops atau dapat langsung datang ke kantor BPBD Kab. Bogor.</li>
          </ul>
        </div>

        <!-- Menambahkan Peta Google menggunakan API -->
        <div class="col-md-6">
          <h4 class="mb-3">Lokasi</h4>
          <div id="map" style="height: 400px;"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Google Maps API Script -->
  <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
  <script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: -6.4848334, lng: 106.8383948 }, // Koordinat BPBD Kab. Bogor
            zoom: 15
        });

        var marker = new google.maps.Marker({
            position: { lat: -6.4848334, lng: 106.8383948 },
            map: map,
            title: "BPBD Kabupaten Bogor"
        });
    }
  </script>

@endsection


