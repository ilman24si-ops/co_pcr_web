@extends('layouts.app')

@section('title', $nama)

@section('content')

<!-- HERO SECTION -->
<section class="hero text-center">
    <div class="container">
        <img src="{{ asset('assets/Logo_Resmi_PCR.png') }}" width="120" class="mb-4">
        <h1 class="fw-bold">{{ $nama }}</h1>
        <p class="lead fst-italic">{{ $slogan }}</p>
    </div>
</section>

<!-- CONTENT -->
<div class="container my-5">

    <!-- VISI & MISI -->
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title text-primary">Visi</h4>
                    <p>{{ $visi }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title text-primary">Misi</h4>
                    <ul>
                        @foreach ($misi as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- DESKRIPSI -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="card-title text-primary">Tentang Kami</h4>
            @foreach ($deskripsi as $p)
                <p>{{ $p }}</p>
            @endforeach
        </div>
    </div>

    <!-- PROGRAM STUDI -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title text-primary mb-3">Program Studi</h4>

            <table class="table table-striped table-hover">
                <thead class="table-primary">
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
                                <span class="badge {{ $p['status'] === 'Unggulan' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $p['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection
