<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'Pengaduan BPBD Kabupaten Bogor')</title>
  <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">

  {{-- Style Kustom untuk Tampilan yang Lebih Baik --}}
  <style>
    /* Memberi warna latar kustom pada navbar */
    .bg-bpbd-orange {
      background-color: #F37021 !important;
    }

    /* Mengatur ukuran logo di navbar */
    .navbar-brand img {
      height: 40px; /* Sesuaikan tinggi logo */
      margin-right: 15px; /* Jarak antara logo dan teks */
    }
    
    .navbar-brand strong {
        font-size: 1.1rem; /* Sedikit memperbesar teks brand */
    }

    /* Styling utama untuk semua link navigasi */
    .navbar-nav .nav-link {
      color: rgba(255, 255, 255, 0.85) !important; /* Warna default sedikit transparan */
      font-weight: bold;
      margin: 0 0.5rem; /* Memberi jarak horizontal antar menu */
      padding: 0.5rem 0.75rem;
      border-radius: 0.375rem; /* Sedikit lengkungan di sudut */
      transition: all 0.2s ease-in-out; /* Transisi halus untuk semua properti */
    }

    /* Efek saat kursor di atas link atau link sedang aktif */
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      color: white !important; /* Warna menjadi putih solid */
      background-color: rgba(255, 255, 255, 0.1); /* Latar belakang subtil */
    }
    /* Menata elemen Kontak */
    .contact-info h2 {
        font-size: 1.75rem;
        color: #333;
        margin-bottom: 20px;
    }

    .contact-info ul li {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 10px;
    }

    .contact-info a {
        color: #F37021;
        text-decoration: none;
    }

    .contact-info a:hover {
        text-decoration: underline;
    }

    .location iframe {
        width: 100%;
        height: 400px;
        border: none;
        border-radius: 10px;
    }

    /* Menambahkan sedikit spasi antara elemen */
    .contact-info li {
        margin-bottom: 15px;
    }

    /* Jarak tambahan antara judul dan menu di layar besar */
    @media (min-width: 992px) {
      .navbar-collapse {
        margin-left: 2rem;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark shadow-sm bg-bpbd-orange py-3">
    <div class="container">
      
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
        <img src="{{ asset('assets/img/bpbd.png') }}" alt="Logo BPBD">
        <strong>Pengaduan BPBD Kabupaten Bogor</strong>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">

          @auth('masyarakat')
            <li class="nav-item">
              <a class="nav-link {{ request()->is('home/masyarakat') ? 'active' : '' }}" href="{{ url('home/masyarakat') }}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('pengaduan') ? 'active' : '' }}" href="{{ url('pengaduan') }}">Data Pengaduan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('pengaduan/create') ? 'active' : '' }}" href="{{ url('pengaduan/create') }}">Buat Pengaduan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('masyarakat/logout') }}">Logout</a>
            </li>

          @elseauth('petugas')
            <li class="nav-item">
              <a class="nav-link {{ request()->is('home/petugas') ? 'active' : '' }}" href="{{ url('home/petugas') }}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('pengaduan*') ? 'active' : '' }}" href="{{ url('pengaduan') }}">Data Pengaduan</a>
            </li>
            
            @if (Auth::guard('petugas')->user()->level === 'admin')
              <li class="nav-item">
                <a class="nav-link {{ request()->is('petugas*') ? 'active' : '' }}" href="{{ url('petugas') }}">Master Data Petugas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('report*') ? 'active' : '' }}" href="{{ url('report') }}">Report</a>
              </li>
            @endif

            <li class="nav-item">
              <a class="nav-link" href="{{ url('petugas/logout') }}">Logout</a>
            </li>

          @else
            <li class="nav-item">
              <a class="nav-link {{ request()->is('masyarakat/login') ? 'active' : '' }}" href="{{ url('masyarakat/login') }}">Login Masyarakat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('petugas/login') ? 'active' : '' }}" href="{{ url('petugas/login') }}">Login Admin</a>
            </li>
          @endauth

        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten Halaman Dinamis -->
  <main class="py-4">
    @yield('content')
  </main>
  
  <!-- Footer -->
  <footer class="bg-light border-top">
    <div class="container">
      <div class="row text-center py-3">
        <div class="col text-muted">
          &copy; {{ date('Y') }} Pengaduan Masyarakat created by Muhammad Haikal Firdaus 065122201
          <p class="mb-0 mt-1">Repost by <a href="https://bpbd.bogorkab.go.id/" title="BPBD Kabupaten Bogor" target="_blank" class="text-decoration-none">BPBD Kabupaten Bogor</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Script JavaScript -->
  <script src="{{ asset('assets/jquery-3.5.1.slim.min.js') }}"></script>
  <script src="{{ asset('assets/bootstrap.bundle.min.js') }}"></script>

</body>
</html>

