<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecordLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kambing',
        'tanggal',
        'jenis_catatan',
        'deskripsi',
        'user_input_id',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function goat(): BelongsTo
    {
        return $this->belongsTo(Goat::class, 'id_kambing');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_input_id');
    }
}
