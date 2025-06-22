<?php

namespace App\Livewire\Anggota;

use Livewire\Component;
use App\Models\Anggota;

class Show extends Component
{
    public $anggota;

    public function mount($id)
    {
        $this->anggota = Anggota::with('organisasi')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.anggota.show');
    }
}