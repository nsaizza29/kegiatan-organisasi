<?php

namespace Database\Seeders;

use App\Models\Kepanitiaan;
use Illuminate\Database\Seeder;

class KepanitiaanSeeder extends Seeder
{
    public function run()
    {
        $jabatan = ['Ketua', 'Wakil Ketua', 'Sekretaris', 'Bendahara', 'Koordinator Acara', 'Koordinator Logistik', 'Anggota'];

        // Kepanitiaan untuk PKKMB (kegiatan_id 1)
        for ($i = 1; $i <= 8; $i++) {
            Kepanitiaan::create([
                'kegiatan_id' => 1,
                'anggota_id' => $i,
                'jabatan' => $jabatan[min($i-1, 6)]
            ]);
        }

        // Kepanitiaan untuk Seminar Kewirausahaan (kegiatan_id 2)
        for ($i = 2; $i <= 6; $i++) {
            Kepanitiaan::create([
                'kegiatan_id' => 2,
                'anggota_id' => $i,
                'jabatan' => $jabatan[min($i-2, 6)]
            ]);
        }

        // Kepanitiaan untuk Lomba Coding (kegiatan_id 3)
        for ($i = 11; $i <= 20; $i++) {
            Kepanitiaan::create([
                'kegiatan_id' => 3,
                'anggota_id' => $i,
                'jabatan' => $i == 11 ? 'Ketua' : ($i == 12 ? 'Sekretaris' : 'Anggota')
            ]);
        }

        // Kepanitiaan untuk Konser Amal (kegiatan_id 4)
        for ($i = 26; $i <= 35; $i++) {
            Kepanitiaan::create([
                'kegiatan_id' => 4,
                'anggota_id' => $i,
                'jabatan' => $i == 26 ? 'Ketua' : ($i == 27 ? 'Koordinator Acara' : 'Anggota')
            ]);
        }
    }
}