<?php

namespace App\Livewire\Kegiatan;

use Livewire\Component;
use App\Models\Kegiatan;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $organisasiFilter = '';
    public $lokasiFilter = '';

    public function render()
    {
        $kegiatans = Kegiatan::with(['organisasi', 'lokasi', 'kepanitiaans'])
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

        return view('livewire.kegiatan.index', compact('kegiatans', 'organisasis', 'lokasis'));
    }

    public function delete($id)
    {
        Kegiatan::find($id)->delete();
        session()->flash('message', 'Kegiatan berhasil dihapus.');
    }
    public function updatingSearch()
{
    $this->resetPage();
}

public function updatingOrganisasiFilter()
{
    $this->resetPage();
}

public function updatingLokasiFilter()
{
    $this->resetPage();
}

}