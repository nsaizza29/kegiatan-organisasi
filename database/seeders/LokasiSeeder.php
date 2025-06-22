<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    public function run()
    {
        $lokasis = [
            [
                'nama_lokasi' => 'Aula Utama',
                'alamat' => 'Gedung Rektorat Lt. 3'
            ],
            [
                'nama_lokasi' => 'Lapangan Basket',
                'alamat' => 'Area Olahraga Kampus Timur'
            ],
            [
                'nama_lokasi' => 'Auditorium',
                'alamat' => 'Gedung Fakultas Teknik Lt. 2'
            ],
            [
                'nama_lokasi' => 'Ruang Seminar FIK',
                'alamat' => 'Gedung Fakultas Ilmu Komputer Lt. 1'
            ],
            [
                'nama_lokasi' => 'Lapangan Upacara',
                'alamat' => 'Depan Gedung Rektorat'
            ],
            [
                'nama_lokasi' => 'Ruang Rapat BEM',
                'alamat' => 'Gedung Student Center Lt. 1'
            ],
        ];

        foreach ($lokasis as $lokasi) {
            Lokasi::create($lokasi);
        }
    }
}