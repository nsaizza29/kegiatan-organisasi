<?php

namespace App\Livewire\Kegiatan;

use Livewire\Component;
use App\Models\Kegiatan;
use App\Models\Organisasi;
use App\Models\Lokasi;

class Create extends Component
{
    public $nama;
    public $tgl_pelaksanaan;
    public $organisasi_id;
    public $lokasi_id;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'tgl_pelaksanaan' => 'required|date',
        'organisasi_id' => 'required|exists:organisasis,id',
        'lokasi_id' => 'required|exists:lokasis,id',
    ];

    public function render()
    {
        $organisasis = Organisasi::all();
        $lokasis = Lokasi::all();
        return view('livewire.kegiatan.create', compact('organisasis', 'lokasis'));
    }

    public function store()
    {
        $this->validate();

        Kegiatan::create([
            'nama' => $this->nama,
            'tgl_pelaksanaan' => $this->tgl_pelaksanaan,
            'organisasi_id' => $this->organisasi_id,
            'lokasi_id' => $this->lokasi_id,
        ]);

        session()->flash('message', 'Kegiatan berhasil ditambahkan.');
        return redirect()->route('kegiatan.index');
    }
}