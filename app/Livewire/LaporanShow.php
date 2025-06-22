<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kegiatan;

class LaporanShow extends Component
{
    public Kegiatan $kegiatan;
    
    public function mount($id)
{
    $this->kegiatan = Kegiatan::with([
        'organisasi',
        'lokasi',
        'kepanitiaans' => function($query) {
            $query->with('anggota')->orderBy('jabatan'); // Ganti 'peran' menjadi 'jabatan'
        }
    ])->findOrFail($id);
}

    public function render()
    {
        return view('livewire.laporan-show');
    }
}