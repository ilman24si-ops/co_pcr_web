<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;

class KunjunganController extends Controller
{
    public function create()
    {
        return view('kunjungan');
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'institusi' => 'required|string|max:255',
        ], [
            'nama.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'institusi.required' => 'Institusi wajib diisi.',
        ]);

        // ✅ SIMPAN KE DATABASE
        Kunjungan::create($validated);

        // ✅ REDIRECT DENGAN PESAN SUKSES
        return redirect()
                ->route('kunjungan.form')
                ->with('success', 'Pendaftaran berhasil!');
    }
}
