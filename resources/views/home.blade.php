@extends('layouts.app')

@section('title', $nama)

@section('content')

<!-- HEADER -->
<div class="text-center mb-5">
    <img src="{{ asset($logo) }}" alt="Logo {{ $nama }}" width="150" class="mb-3">
    <h1 class="fw-bold">{{ $nama }}</h1>
    <p class="text-muted fst-italic">{{ $slogan }}</p>
   <a href="{{ route('kunjungan') }}" class="btn btn-primary">
    Kunjungan
</a>



</div>

<!-- VISI -->
<div class="mb-4">
    <h3 class="fw-semibold">Visi</h3>
    <p>{{ $visi }}</p>
</div>

<!-- MISI -->
<div class="mb-4">
    <h3 class="fw-semibold">Misi</h3>
    <ul>
        @foreach ($misi as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>

<!-- DESKRIPSI -->
<div class="mb-4">
    <h3 class="fw-semibold">Deskripsi</h3>
    @foreach ($deskripsi as $paragraf)
        <p>{{ $paragraf }}</p>
    @endforeach
</div>

<!-- DAFTAR PROGRAM STUDI -->
<div class="mb-5">
    <h3 class="fw-semibold">Daftar Program Studi</h3>

    <table class="table table-bordered table-hover mt-3">
        <thead class="table-light">
            <tr>
                <th>Nama Program Studi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prodi as $p)
                <tr>
                    <td>{{ $p['nama'] }}</td>
                    <td>
                        <span class="badge {{ $p['status'] == 'Unggulan' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $p['status'] }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- 5 Kunjungan Terbaru -->
<section id="kunjungan" class="section">
    <div class="container">
        <h2>5 Kunjungan Terbaru</h2>
        <div class="row">
            @forelse($kunjungans as $kunjungan)
            <div class="col-md-4 mt-3">
                <div class="card p-3">
                    <h5>{{ $kunjungan->nama }}</h5>
                    <p>Email: {{ $kunjungan->email }}</p>
                    <p>Institusi: {{ $kunjungan->institusi }}</p>
                    @if($kunjungan->foto)
                        <img src="{{ asset('storage/' . $kunjungan->foto) }}" alt="Foto {{ $kunjungan->nama }}" class="img-fluid mt-2">
                    @endif
                    <small class="text-muted">Didaftarkan: {{ $kunjungan->created_at->format('d M Y') }}</small>
                </div>
            </div>
            @empty
            <p>Belum ada data kunjungan.</p>
            @endforelse
        </div>
    </div>
</section>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $nama }}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <img src="{{ asset($logo) }}" alt="Logo {{ $nama }}" height="40">
        <h1 class="sitename ms-2">{{ $nama }}</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="active">Home</a></li>
          <li><a href="#visi">Visi & Misi</a></li>
          <li><a href="#prodi">Program Studi</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <img src="{{ asset('assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h2>{{ $nama }}</h2>
        <p>{{ $slogan }}</p>
      </div>
    </section>

    <!-- Deskripsi -->
    <section class="section">
      <div class="container">
        @foreach($deskripsi as $item)
          <p>{{ $item }}</p>
        @endforeach
      </div>
    </section>

    <!-- Visi & Misi -->
    <section id="visi" class="section">
      <div class="container">
        <h2>Visi</h2>
        <p>{{ $visi }}</p>

        <h2 class="mt-4">Misi</h2>
        <ul>
          @foreach($misi as $item)
            <li>{{ $item }}</li>
          @endforeach
        </ul>
      </div>
    </section>

    <!-- Program Studi -->
    <section id="prodi" class="section">
      <div class="container">
        <h2>Program Studi</h2>
        <div class="row">
          @foreach($prodi as $p)
          <div class="col-md-4 mt-3">
            <div class="card p-3">
              <h5>{{ $p['nama'] }}</h5>
              <p>Status: <strong>{{ $p['status'] }}</strong></p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

  </main>

  <footer id="footer" class="footer dark-background">
    <div class="container text-center">
      <h3 class="sitename">{{ $nama }}</h3>
      <p>{{ $slogan }}</p>

      <div class="copyright">
        © {{ date('Y') }} {{ $nama }} - All Rights Reserved
      </div>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/typed.js/typed.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>

@endsection
