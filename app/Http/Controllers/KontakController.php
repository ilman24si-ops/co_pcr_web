<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function send(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'email' => 'required|email',
            'saran' => 'required|string',
        ]);

        // Simpan ke session sementara untuk ditampilkan kembali
        $saranList = session()->get('sarans', []);
        $saranList[] = $data; // tambahkan saran baru
        session()->put('sarans', $saranList);

        // Kembali ke halaman kontak dengan pesan sukses
        return back()->with('success', 'Terima kasih! Saran Anda telah terkirim.');
    }
}
