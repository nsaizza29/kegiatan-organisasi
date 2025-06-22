<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            OrganisasiSeeder::class,
            LokasiSeeder::class,
            AnggotaSeeder::class,
            KegiatanSeeder::class,
            KepanitiaanSeeder::class,
        ]);
    }
}