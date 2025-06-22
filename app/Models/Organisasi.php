<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_organisasi', 'jenis'];

    public function anggotas()
    {
        return $this->hasMany(Anggota::class);
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}