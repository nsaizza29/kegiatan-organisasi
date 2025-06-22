<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    public function run()
    {
        // Data anggota untuk BEM
        for ($i = 1; $i <= 10; $i++) {
            Anggota::create([
                'nama' => 'Anggota BEM ' . $i,
                'nim' => '202300' . $i,
                'organisasi_id' => 1
            ]);
        }

        // Data anggota untuk DPM
        for ($i = 1; $i <= 8; $i++) {
            Anggota::create([
                'nama' => 'Anggota DPM ' . $i,
                'nim' => '202301' . $i,
                'organisasi_id' => 2
            ]);
        }

        // Data anggota untuk Himpunan Informatika
        for ($i = 1; $i <= 15; $i++) {
            Anggota::create([
                'nama' => 'Anggota HIMIF ' . $i,
                'nim' => '202302' . $i,
                'organisasi_id' => 3
            ]);
        }

        // Data anggota untuk UKM Paduan Suara
        for ($i = 1; $i <= 12; $i++) {
            Anggota::create([
                'nama' => 'Anggota UKM PS ' . $i,
                'nim' => '202303' . $i,
                'organisasi_id' => 5
            ]);
        }
    }
}