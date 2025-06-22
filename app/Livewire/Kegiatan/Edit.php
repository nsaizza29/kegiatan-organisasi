<?php

namespace App\Livewire\Kegiatan;

use Livewire\Component;
use App\Models\Kegiatan;
use App\Models\Organisasi;
use App\Models\Lokasi;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    public $kegiatanId;
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

    public function mount($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        
        $this->kegiatanId = $kegiatan->id;
        $this->nama = $kegiatan->nama;
        $this->tgl_pelaksanaan = $kegiatan->tgl_pelaksanaan->format('Y-m-d');
        $this->organisasi_id = $kegiatan->organisasi_id;
        $this->lokasi_id = $kegiatan->lokasi_id;
    }

    public function update()
    {
        $this->validate();

        DB::transaction(function () {
            $kegiatan = Kegiatan::findOrFail($this->kegiatanId);
            
            $kegiatan->update([
                'nama' => $this->nama,
                'tgl_pelaksanaan' => $this->tgl_pelaksanaan,
                'organisasi_id' => $this->organisasi_id,
                'lokasi_id' => $this->lokasi_id,
            ]);
        });

        session()->flash('success', 'Data kegiatan berhasil diperbarui.');
        return redirect()->route('kegiatan.index', $this->kegiatanId);
    }

    public function render()
    {
        return view('livewire.kegiatan.edit', [
            'organisasis' => Organisasi::all(),
            'lokasis' => Lokasi::all(),
        ]);
    }
}