<?php

namespace App\Http\Livewire\Kegiatan;

use Livewire\Component;
use App\Models\Kegiatan;

class Index extends Component
{
    public $confirmingKegiatanDeletion = false;
    public $kegiatanIdBeingDeleted;

    public function confirmKegiatanDeletion($id)
    {
        $this->confirmingKegiatanDeletion = true;
        $this->kegiatanIdBeingDeleted = $id;
    }

    public function deleteKegiatan()
    {
        // Hanya hapus kegiatan, kepanitiaan akan tetap ada dengan kegiatan_id = NULL
        Kegiatan::findOrFail($this->kegiatanIdBeingDeleted)->delete();
        
        $this->confirmingKegiatanDeletion = false;
        $this->kegiatanIdBeingDeleted = null;
        
        session()->flash('message', 'Kegiatan berhasil dihapus (data kepanitiaan tetap ada).');
    }

    public function render()
    {
        return view('livewire.kegiatan.index', [
            'kegiatans' => Kegiatan::with(['organisasi', 'lokasi'])
                                ->latest()
                                ->paginate(10)
        ]);
    }
}