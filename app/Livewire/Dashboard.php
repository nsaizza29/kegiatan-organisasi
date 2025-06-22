<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kegiatan;
use App\Models\Anggota;
use App\Models\Kepanitiaan;
use App\Models\Organisasi;

class Dashboard extends Component
{
    public function render()
    {
        $totalKegiatan = Kegiatan::count();
        $totalAnggota = Anggota::count();
        $totalLaporan = Kepanitiaan::count();
        $totalOrganisasi = Organisasi::count();

        return view('livewire.dashboard', [
            'totalKegiatan' => $totalKegiatan,
            'totalAnggota' => $totalAnggota,
            'totalLaporan' => $totalLaporan,
            'totalOrganisasi' => $totalOrganisasi,
        ]);
    }
} 