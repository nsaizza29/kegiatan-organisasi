<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nim', 'organisasi_id'];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function kepanitiaans()
    {
        return $this->hasMany(Kepanitiaan::class);
    }
}