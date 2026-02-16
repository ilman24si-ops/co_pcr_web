<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kunjungan;

class KunjunganSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            Kunjungan::create([
                'nama' => 'Pengunjung ' . $i,
                'email' => 'pengunjung' . $i . '@email.com',
                'institusi' => 'Sekolah / Instansi ' . $i,
            ]);
        }
    }
}
