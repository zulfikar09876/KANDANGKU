<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fattening extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kambing',
        'berat_awal',
        'berat_akhir',
        'periode_mulai',
        'periode_selesai',
        'pakan_fokus',
        'hasil_penggemukan',
        'catatan',
    ];

    protected $casts = [
        'periode_mulai' => 'date',
        'periode_selesai' => 'date',
        'berat_awal' => 'decimal:2',
        'berat_akhir' => 'decimal:2',
    ];

    public function goat(): BelongsTo
    {
        return $this->belongsTo(Goat::class, 'id_kambing');
    }
}
