<?php

namespace App\Livewire\Anggota;

use Livewire\Component;
use App\Models\Anggota;
use App\Models\Organisasi;

class Edit extends Component
{
    public $anggota_id;
    public $nama;
    public $nim;
    public $organisasi_id;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'nim' => 'required|string|max:20|unique:anggotas,nim,',
        'organisasi_id' => 'required|exists:organisasis,id',
    ];

    public function mount($id)
    {
        $anggota = Anggota::find($id);
        $this->anggota_id = $anggota->id;
        $this->nama = $anggota->nama;
        $this->nim = $anggota->nim;
        $this->organisasi_id = $anggota->organisasi_id;
        
        $this->rules['nim'] .= $this->anggota_id;
    }

    public function render()
    {
        $organisasis = Organisasi::all();
        return view('livewire.anggota.edit', compact('organisasis'));
    }

    public function update()
    {
        $this->validate();

        $anggota = Anggota::find($this->anggota_id);
        $anggota->update([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'organisasi_id' => $this->organisasi_id,
        ]);

        session()->flash('message', 'Anggota berhasil diperbarui.');
        return redirect()->route('anggota.index');
    }
}