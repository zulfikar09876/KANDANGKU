<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kid extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_induk',
        'nama_anak',
        'tanggal_lahir',
        'jenis_kelamin',
        'berat_lahir',
        'kolostrum_terpenuhi',
        'tanggal_sapih',
        'pakan_tambahan',
        'status_kesehatan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_sapih' => 'date',
        'berat_lahir' => 'decimal:2',
        'kolostrum_terpenuhi' => 'boolean',
    ];

    public function induk(): BelongsTo
    {
        return $this->belongsTo(Goat::class, 'id_induk');
    }

    /**
     * Alias relationship for readability in views/controllers.
     */
    public function mother(): BelongsTo
    {
        return $this->belongsTo(Goat::class, 'id_induk');
    }
}
