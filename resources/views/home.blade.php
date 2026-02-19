@extends('layouts.app')

@section('title', $nama)

@section('content')
<div class="container mt-5">

    <div class="text-center mb-5">
        <h2>{{ $nama }}</h2>
        <p class="text-muted fst-italic">{{ $slogan }}</p>
    </div>

    <!-- Visi -->
    <h3 id="visi">Visi</h3>
    <p>{{ $visi }}</p>

    <!-- Misi -->
    <h3 id="misi">Misi</h3>
    <ul>
        @foreach($misi as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    <!-- Deskripsi (Tampilan lengkap) -->
    <h3>Tentang PCR</h3>
    @foreach($deskripsi as $paragraf)
        <p>{{ $paragraf }}</p>
    @endforeach

 <!-- Program Studi -->
<h3 id="program-studi">Program Studi</h3>
<div class="row">
    {{-- Kolom 2: Unggulan --}}
    <div class="col-md-6">
       
        @foreach($prodi as $p)
            @if($p['status'] == 'Unggulan' && in_array($p['nama'], ['Teknik Informatika', 'Sistem Informasi']))
                <div class="card p-3 mb-3">
                    <h6 class="text-dark">{{ $p['nama'] }}</h6>
                    <span class="badge bg-success text-dark">{{ $p['status'] }}</span>
                </div>
            @endif
        @endforeach
    </div>

 
    <div class="col-md-6">
    
        @foreach($prodi as $p)
            @if($p['status'] != 'Unggulan' && in_array($p['nama'], ['Teknik Mesin', 'Akuntansi', 'Teknik Listrik']))
                <div class="card p-3 mb-3">
                    <h6 class="text-dark">{{ $p['nama'] }}</h6>
                    <span class="badge bg-secondary text-dark">{{ $p['status'] }}</span>
                </div>
            @endif
        @endforeach
    </div>
</div>


    <!-- Kunjungan Terbaru (Tampilan lengkap) -->
    <h3 class="mt-5">Kunjungan Terbaru</h3>
    <div class="row">
        @forelse($kunjungans as $kunjungan)
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $kunjungan->nama }}</h5>
                    <p class="card-text">
                        <strong>Email:</strong> {{ $kunjungan->email }}<br>
                        <strong>Institusi:</strong> {{ $kunjungan->institusi }}<br>
                        <strong>Tanggal:</strong> {{ $kunjungan->created_at->format('d M Y') }}
                    </p>
                    @if($kunjungan->foto)
                        <img src="{{ asset('storage/'.$kunjungan->foto) }}" width="100" class="mt-2 rounded">
                    @endif
                </div>
            </div>
        </div>
        @empty
        <p class="text-muted">Belum ada data kunjungan</p>
        @endforelse
    </div>

</div>
@endsection