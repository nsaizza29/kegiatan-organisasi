<?php

namespace App\Livewire\Kepanitiaan;

use Livewire\Component;
use App\Models\Kegiatan;
use App\Models\Anggota;
use App\Models\Kepanitiaan;

class Manage extends Component
{
    public $kegiatan_id;
    public $anggota_id;
    public $jabatan;
    public $selectedPanitia = [];

    public function mount($id)
    {
        $this->kegiatan_id = $id;
    }

    public function render()
    {
        $kegiatan = Kegiatan::with(['kepanitiaans.anggota', 'organisasi'])->find($this->kegiatan_id);
        
        if (!$kegiatan) {
            return view('livewire.kepanitiaan.manage', ['kegiatan' => null, 'anggotas' => collect()]);
        }

        $existingPanitiaIds = $kegiatan->kepanitiaans->pluck('anggota_id')->toArray();
        
        $anggotas = Anggota::where('organisasi_id', $kegiatan->organisasi_id)
                          ->whereNotIn('id', $existingPanitiaIds)
                          ->get();
        
        return view('livewire.kepanitiaan.manage', compact('kegiatan', 'anggotas'));
    }

    public function addPanitia()
    {
        $this->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'jabatan' => 'required|string|max:255',
        ]);

        Kepanitiaan::create([
            'kegiatan_id' => $this->kegiatan_id,
            'anggota_id' => $this->anggota_id,
            'jabatan' => $this->jabatan,
        ]);

        $this->reset(['anggota_id', 'jabatan']);
        session()->flash('success', 'Panitia berhasil ditambahkan.');
    }

    // Livewire Component Method
    public function deletePanitia($panitiaId)
    {
        try {
            $deleted = Kepanitiaan::where('kegiatan_id', $this->kegiatan_id)
                                ->where('id', $panitiaId)
                                ->delete();

            if ($deleted) {
                session()->flash('success', 'Panitia berhasil dihapus.');
            } else {
                session()->flash('error', 'Panitia tidak ditemukan.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus panitia: ' . $e->getMessage());
        }
    }
    
}