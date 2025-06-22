<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kegiatan;
use Livewire\WithPagination;

class Laporan extends Component
{
    use WithPagination;
    
   
    public $search = '';
    public $organisasiFilter = '';
    public $lokasiFilter = '';

    public function render()
    {
        $kegiatans = Kegiatan::with(['organisasi', 'lokasi', 'kepanitiaans'])
            ->withCount('kepanitiaans')
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->when($this->organisasiFilter, function ($query) {
                $query->where('organisasi_id', $this->organisasiFilter);
            })
            ->when($this->lokasiFilter, function ($query) {
                $query->where('lokasi_id', $this->lokasiFilter);
            })
            ->orderBy('tgl_pelaksanaan', 'desc')
            ->paginate(10);

        $organisasis = \App\Models\Organisasi::all();
        $lokasis = \App\Models\Lokasi::all();

        return view('livewire.laporan', compact('kegiatans', 'organisasis', 'lokasis'));
    }
}