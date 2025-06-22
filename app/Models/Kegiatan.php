<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'tgl_pelaksanaan', 'organisasi_id', 'lokasi_id'];

    protected $casts = [
    'tgl_pelaksanaan' => 'date',
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function kepanitiaans()
    {
        return $this->hasMany(Kepanitiaan::class);
    }

    public function anggotas()
    {
        return $this->belongsToMany(Anggota::class, 'kepanitiaans')
                    ->withPivot('jabatan')
                    ->withTimestamps();
    }
}