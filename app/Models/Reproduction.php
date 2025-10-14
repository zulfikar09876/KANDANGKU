<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reproduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kambing_betina',
        'id_kambing_jantan',
        'tanggal_kawin',
        'metode',
        'perkiraan_melahirkan',
        'status_reproduksi',
        'jumlah_anak',
        'catatan',
    ];

    protected $casts = [
        'tanggal_kawin' => 'date',
        'perkiraan_melahirkan' => 'date',
    ];

    public function female(): BelongsTo
    {
        return $this->belongsTo(Goat::class, 'id_kambing_betina');
    }

    public function male(): BelongsTo
    {
        return $this->belongsTo(Goat::class, 'id_kambing_jantan');
    }
}
