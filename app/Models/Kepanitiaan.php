<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepanitiaan extends Model
{
    use HasFactory;

    protected $fillable = ['kegiatan_id', 'anggota_id', 'jabatan'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class)->withDefault([
            'nama' => 'Kegiatan Telah Dihapus'
        ]);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}