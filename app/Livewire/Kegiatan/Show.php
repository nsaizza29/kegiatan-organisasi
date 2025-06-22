<?php

namespace App\Livewire\Kegiatan;

use Livewire\Component;
use App\Models\Kegiatan;

class Show extends Component
{
    public kegiatan $kegiatan;

    public function mount($id)
    {
        $this->kegiatan = Kegiatan::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.kegiatan.show');
    }
}
