<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Health extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kambing',
        'tanggal_periksa',
        'dokter_hewan',
        'gejala',
        'diagnosa',
        'tindakan',
        'vaksinasi',
        'tanggal_vaksin',
        'obat_cacing',
        'tanggal_obat',
        'status_kondisi',
        'catatan',
    ];

    protected $casts = [
        'tanggal_periksa' => 'date',
        'tanggal_vaksin' => 'date',
        'tanggal_obat' => 'date',
    ];

    public function goat(): BelongsTo
    {
        return $this->belongsTo(Goat::class, 'id_kambing');
    }
}
