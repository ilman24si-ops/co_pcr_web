<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Kunjungan - PCR</title>

  <!-- Vendor CSS -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body>

<header class="header fixed-top">
  <div class="container d-flex justify-content-between align-items-center">
      <h3>Politeknik Caltex Riau</h3>
      <nav>
          <a href="/">Home</a> |
          <a href="{{ route('kunjungan.form') }}">Kunjungan</a>
      </nav>
  </div>
</header>

<main class="main" style="margin-top:100px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <div class="card shadow p-4">

          <h3 class="text-center mb-4">Form Pendaftaran Kunjungan Kampus</h3>

          {{-- Pesan sukses --}}
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          <form action="{{ route('kunjungan.store') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
              @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <!-- Institusi -->
            <div class="mb-3">
              <label class="form-label">Institusi</label>
              <input type="text" name="institusi" class="form-control @error('institusi') is-invalid @enderror" value="{{ old('institusi') }}">
              @error('institusi')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <!-- Tombol -->
            <div class="text-center">
              <button type="submit" class="btn btn-primary w-100">
                Kirim Pendaftaran
              </button>
            </div>

          </form>

        </div>

      </div>
    </div>
  </div>
</main>

<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
