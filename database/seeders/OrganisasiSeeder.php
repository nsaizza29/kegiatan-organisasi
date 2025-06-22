<?php

namespace Database\Seeders;

use App\Models\Organisasi;
use Illuminate\Database\Seeder;

class OrganisasiSeeder extends Seeder
{
    public function run()
    {
        $organisasis = [
            [
                'nama_organisasi' => 'BEM Universitas',
                'jenis' => 'Badan Eksekutif Mahasiswa'
            ],
            [
                'nama_organisasi' => 'DPM Universitas',
                'jenis' => 'Dewan Perwakilan Mahasiswa'
            ],
            [
                'nama_organisasi' => 'Himpunan Mahasiswa Informatika',
                'jenis' => 'Himpunan Jurusan'
            ],
            [
                'nama_organisasi' => 'Himpunan Mahasiswa Teknik Sipil',
                'jenis' => 'Himpunan Jurusan'
            ],
            [
                'nama_organisasi' => 'UKM Paduan Suara',
                'jenis' => 'Unit Kegiatan Mahasiswa'
            ],
            [
                'nama_organisasi' => 'UKM Basket',
                'jenis' => 'Unit Kegiatan Mahasiswa'
            ],
            [
                'nama_organisasi' => 'UKM Kesenian',
                'jenis' => 'Unit Kegiatan Mahasiswa'
            ],
        ];

        foreach ($organisasis as $organisasi) {
            Organisasi::create($organisasi);
        }
    }
}