<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>List Kunjungan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">

<h3 class="mb-4 fw-semibold">List Data Kunjungan Kampus</h3>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('kunjungan.create') }}" class="btn btn-primary btn-sm mb-3">
    + Tambah Kunjungan
</a>



<div class="card shadow-sm">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 70px;">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Institusi</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kunjungans as $k)
                        <tr>
                            <td>{{ $loop->iteration + ($kunjungans->firstItem() ?? 1) - 1 }}</td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->email }}</td>
                            <td>{{ $k->institusi }}</td>
                            <td>
                                @if($k->foto)
                                    <img src="{{ asset('storage/'.$k->foto) }}"
                                         width="60"
                                         class="rounded shadow-sm">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Belum ada data kunjungan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination angka --}}
        <div class="d-flex justify-content-center mt-3">
            <ul class="pagination pagination-sm mb-0">
                @for ($page = 1; $page <= $kunjungans->lastPage(); $page++)
                    <li class="page-item {{ $page == $kunjungans->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $kunjungans->url($page) }}">
                            {{ $page }}
                        </a>
                    </li>
                @endfor
            </ul>
        </div>

    </div>
</div>

</div>

</body>
</html>
