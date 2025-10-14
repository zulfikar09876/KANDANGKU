<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Marketing extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kambing',
        'produk',
        'harga',
        'status',
        'tanggal_jual',
        'pembeli',
        'kontak_pembeli',
        'testimoni',
        'catatan',
    ];

    protected $casts = [
        'tanggal_jual' => 'date',
        'harga' => 'decimal:2',
    ];

    public function goat(): BelongsTo
    {
        return $this->belongsTo(Goat::class, 'id_kambing');
    }
}
