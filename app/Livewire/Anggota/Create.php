<?php

namespace App\Livewire\Anggota;

use Livewire\Component;
use App\Models\Anggota;
use App\Models\Organisasi;

class Create extends Component
{
    public $nama;
    public $nim;
    public $organisasi_id;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'nim' => 'required|string|max:20|unique:anggotas',
        'organisasi_id' => 'required|exists:organisasis,id',
    ];

    public function render()
    {
        $organisasis = Organisasi::all();
        return view('livewire.anggota.create', compact('organisasis'));
    }

    public function store()
    {
        $this->validate();

        Anggota::create([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'organisasi_id' => $this->organisasi_id,
        ]);

        session()->flash('message', 'Anggota berhasil ditambahkan.');
        return redirect()->route('anggota.index');
    }
}