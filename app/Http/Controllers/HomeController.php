<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Kunjungan;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'nama'      => 'Politeknik Caltex Riau',
            'visi'      => 'Diakui Sebagai Politeknik Unggul yang Mampu Bersaing dalam Bidang Teknologi dan Bisnis Terapan pada Tingkat Nasional Maupun ASEAN Tahun 2031',
            'misi'      => [
                'Menyelenggarakan Sistem Pendidikan Vokasi bidang Teknologi dan Bisnis yang berkualitas serta relevan dengan tantangan Nasional maupun ASEAN',
                'Menciptakan budaya akademik dan budaya organisasi yang berkarakter dan bermartabat',
                'Melaksanakan penelitian dan menyebarluaskan hasilnya untuk pengembangan bidang teknologi dan bisnis terapan'
            ],
            'deskripsi' => [
                'Politeknik Caltex Riau (PCR) merupakan institusi pendidikan tinggi vokasi yang berfokus pada bidang teknologi dan bisnis terapan. Didirikan dengan komitmen untuk menghasilkan lulusan yang kompeten dan siap berkontribusi dalam dunia industri, PCR terus berinovasi dalam metode pembelajaran dan kurikulum yang sesuai dengan perkembangan zaman.',

                'Sebagai politeknik unggulan di wilayah Riau, PCR tidak hanya mengedepankan aspek akademik tetapi juga membangun karakter mahasiswa melalui berbagai kegiatan kemahasiswaan dan pengembangan soft skills. Fasilitas pendidikan yang modern dan lengkap mendukung terciptanya lingkungan belajar yang kondusif bagi pengembangan potensi setiap individu.',

                'Dengan jaringan kerjasama yang luas bersama industri dan institusi pendidikan dalam dan luar negeri, PCR memastikan bahwa lulusannya memiliki daya saing global. Berbagai program sertifikasi dan magang industri menjadi bagian integral dari proses pendidikan untuk mempersiapkan mahasiswa menghadapi tantangan dunia kerja yang semakin kompetitif.'
            ],
            'slogan'    => 'Empowers You to Global Competition',
            'logo'      => 'assets/Logo_Resmi_PCR.png',

            // DAFTAR PROGRAM STUDI
            'prodi' => [
                ['nama' => 'Teknik Informatika', 'status' => 'Unggulan'],
                ['nama' => 'Sistem Informasi', 'status' => 'Unggulan'],
                ['nama' => 'Teknik Elektronika', 'status' => 'Reguler'],
                ['nama' => 'Teknik Mesin', 'status' => 'Reguler'],
                ['nama' => 'Akuntansi', 'status' => 'Reguler'],
            ],

            // 5 Kunjungan Terbaru
            'kunjungans' => Kunjungan::latest()->take(5)->get()
        ];

        return view('home', $data);
    }
}