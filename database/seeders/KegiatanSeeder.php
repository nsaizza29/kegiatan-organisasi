<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    public function run()
    {
        $kegiatans = [
            [
                'nama' => 'PKKMB 2023',
                'tgl_pelaksanaan' => Carbon::now()->addDays(10),
                'organisasi_id' => 1,
                'lokasi_id' => 5
            ],
            [
                'nama' => 'Seminar Kewirausahaan',
                'tgl_pelaksanaan' => Carbon::now()->addDays(15),
                'organisasi_id' => 1,
                'lokasi_id' => 3
            ],
            [
                'nama' => 'Lomba Coding Nasional',
                'tgl_pelaksanaan' => Carbon::now()->addDays(20),
                'organisasi_id' => 3,
                'lokasi_id' => 4
            ],
            [
                'nama' => 'Konser Amal',
                'tgl_pelaksanaan' => Carbon::now()->addDays(25),
                'organisasi_id' => 5,
                'lokasi_id' => 1
            ],
            [
                'nama' => 'Turnamen Basket Antar Fakultas',
                'tgl_pelaksanaan' => Carbon::now()->addDays(30),
                'organisasi_id' => 6,
                'lokasi_id' => 2
            ],
            [
                'nama' => 'Musyawarah Besar',
                'tgl_pelaksanaan' => Carbon::now()->addDays(5),
                'organisasi_id' => 2,
                'lokasi_id' => 6
            ],
            [
                'nama' => 'Workshop Web Development',
                'tgl_pelaksanaan' => Carbon::now()->addDays(18),
                'organisasi_id' => 3,
                'lokasi_id' => 4
            ],
        ];

        foreach ($kegiatans as $kegiatan) {
            Kegiatan::create($kegiatan);
        }
    }
}