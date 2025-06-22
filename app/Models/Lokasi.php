<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_lokasi', 'alamat'];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}