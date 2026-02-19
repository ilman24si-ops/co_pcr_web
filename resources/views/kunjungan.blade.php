@extends('layouts.app')

@section('title', 'List Kunjungan - ' . ($nama ?? 'Politeknik Caltex Riau'))

@section('content')

<div class="container mt-5">
    <h3 class="mb-4 fw-semibold">List Data Kunjungan Kampus</h3>

    <!-- Tombol Tambah Kunjungan -->
    <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#tambahKunjunganModal">
        + Tambah Kunjungan
    </button>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Institusi</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kunjungans as $index => $k)
                        <tr>
                            <td>{{ $kunjungans->firstItem() + $index }}</td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->email }}</td>
                            <td>{{ $k->institusi }}</td>
                            <td>
                                @if($k->foto)
                                    <img src="{{ asset('storage/'.$k->foto) }}" width="60" height="60" class="rounded" style="object-fit: cover;">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Belum ada data kunjungan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($kunjungans->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $kunjungans->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Tambah Kunjungan -->
<div class="modal fade" id="tambahKunjunganModal" tabindex="-1" aria-labelledby="tambahKunjunganModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahKunjunganModalLabel">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Kunjungan Baru
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kunjungan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                               id="nama" name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="institusi" class="form-label">Institusi/Asal <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('institusi') is-invalid @enderror" 
                               id="institusi" name="institusi" value="{{ old('institusi') }}" required>
                        @error('institusi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto (Opsional)</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                               id="foto" name="foto" accept="image/*">
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maks: 2MB</small>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-2"></i>Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection