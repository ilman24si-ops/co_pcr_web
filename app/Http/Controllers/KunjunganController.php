<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;

class KunjunganController extends Controller
{
    // HALAMAN LIST KUNJUNGAN
    public function index()
    {
        $kunjungans = Kunjungan::latest()->paginate(10);
        return view('kunjungan', compact('kunjungans')); // file: resources/views/kunjungan.blade.php
    }

    // HALAMAN FORM
    public function create()
    {
        return view('form'); // file: resources/views/form.blade.php
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'institusi' => 'required|string|max:255',
        ]);

        Kunjungan::create($validated);

        // Redirect ke halaman list kunjungan
        return redirect()->route('kunjungan.index')
            ->with('success', 'Data berhasil disimpan!');
    }
}
