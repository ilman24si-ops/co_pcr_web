<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;

class KunjunganController extends Controller
{
    // Menampilkan halaman kunjungan beserta data
    public function index()
    {
        $kunjungans = Kunjungan::latest()->paginate(10);

        return view('kunjungan', compact('kunjungans')); // pakai satu view saja
    }

    // SIMPAN DATA dari form di halaman yang sama
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'institusi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_kunjungan', 'public');
        }

        Kunjungan::create($validated);

        return redirect()->route('kunjungan')
            ->with('success', 'Data kunjungan berhasil ditambahkan.');
    }
}
