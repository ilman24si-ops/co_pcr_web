@extends('layouts.app')

@section('title', 'Saran - Politeknik Caltex Riau')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Kirim Saran</h2>
            <p class="text-center text-muted mb-4">Masukkan email Anda dan saran yang ingin disampaikan.</p>

            {{-- Pesan sukses --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form saran --}}
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form action="{{ route('kontak.send') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
                        </div>

                        <div class="mb-3">
                            <label for="saran" class="form-label">Saran</label>
                            <textarea name="saran" id="saran" rows="5" class="form-control" placeholder="Tuliskan saran Anda" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Kirim Saran</button>
                    </form>
                </div>
            </div>

            {{-- Daftar saran yang dikirim --}}
            @php
                $sarans = session('sarans', []);
            @endphp

            @if(count($sarans) > 0)
                <h4 class="mb-3">Saran Terkirim</h4>
                <ul class="list-group">
                    @foreach($sarans as $saran)
                        <li class="list-group-item">
                            <strong>{{ $saran['email'] }}</strong>: {{ $saran['saran'] }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
