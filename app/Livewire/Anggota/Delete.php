<?php

namespace App\Http\Livewire\Anggota;

use Livewire\Component;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;

class Delete extends Component
{
    public $anggotaId;
    public $confirmingAnggotaDeletion = false;
    public $hasKepanitiaan = false;

    public function confirmDeletion($id)
    {
        $this->anggotaId = $id;
        $anggota = Anggota::with('kepanitiaans')->find($id);
        
        $this->hasKepanitiaan = $anggota->kepanitiaans->isNotEmpty();
        $this->confirmingAnggotaDeletion = true;
    }

    public function deleteAnggota()
    {
        DB::transaction(function () {
            $anggota = Anggota::findOrFail($this->anggotaId);
            
            // Jika anggota memiliki kepanitiaan, set anggota_id menjadi null
            if ($anggota->kepanitiaans->isNotEmpty()) {
                $anggota->kepanitiaans()->update(['anggota_id' => null]);
            }
            
            $anggota->delete();
        });

        $this->reset();
        session()->flash('success', 'Anggota berhasil dihapus.');
        return redirect()->route('anggota.index');
    }

    public function render()
    {
        return view('livewire.anggota.delete');
    }
}