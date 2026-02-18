<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kunjungan; // Import Model
use Faker\Factory as Faker;

class KunjunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Data dummy Indonesia

        for ($i = 0; $i < 100; $i++) {
            Kunjungan::create([
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'institusi' => $faker->company,
            ]);
        }
    }
}
