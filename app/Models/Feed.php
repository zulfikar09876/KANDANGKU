<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feed extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_pakan',
        'nama_pakan',
        'jumlah_stok',
        'satuan',
        'jadwal_pemberian',
        'pemberi_pakan_id',
        'catatan',
    ];

    protected $casts = [
        'jadwal_pemberian' => 'datetime',
        'jumlah_stok' => 'decimal:2',
    ];

    public function pemberiPakan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pemberi_pakan_id');
    }
}
