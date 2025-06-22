<?php

namespace App\Livewire\Anggota;

use Livewire\Component;
use App\Models\Anggota;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $organisasiFilter = '';

    public function render()
    {
        $anggotas = Anggota::with('organisasi')
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                      ->orWhere('nim', 'like', '%' . $this->search . '%');
            })
            ->when($this->organisasiFilter, function ($query) {
                $query->where('organisasi_id', $this->organisasiFilter);
            })
            ->orderBy('nama')
            ->paginate(10);

        $organisasis = \App\Models\Organisasi::all();

        return view('livewire.anggota.index', compact('anggotas', 'organisasis'));
    }

    public function delete($id)
    {
        Anggota::find($id)->delete();
        session()->flash('message', 'Anggota berhasil dihapus.');
    }
}