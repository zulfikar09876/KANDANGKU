<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kandang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kandang',
        'jenis_kandang',
        'kapasitas',
        'lokasi',
        'kondisi',
        'jumlah_penghuni',
    ];

    public function goats(): HasMany
    {
        return $this->hasMany(Goat::class);
    }
}
