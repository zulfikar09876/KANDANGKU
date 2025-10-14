<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Goat extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_kambing',
        'nama_kambing',
        'jenis',
        'ras',
        'jenis_kelamin',
        'tanggal_lahir',
        'umur_bulan',
        'berat_badan',
        'status_kondisi',
        'foto_path',
        'catatan',
        'kandang_id',
        'generasi',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'berat_badan' => 'decimal:2',
    ];

    public function kandang(): BelongsTo
    {
        return $this->belongsTo(Kandang::class);
    }

    public function reproductionsAsFemale(): HasMany
    {
        return $this->hasMany(Reproduction::class, 'id_kambing_betina');
    }

    public function reproductionsAsMale(): HasMany
    {
        return $this->hasMany(Reproduction::class, 'id_kambing_jantan');
    }

    public function kids(): HasMany
    {
        return $this->hasMany(Kid::class, 'id_induk');
    }

    public function healths(): HasMany
    {
        return $this->hasMany(Health::class, 'id_kambing');
    }

    public function fattenings(): HasMany
    {
        return $this->hasMany(Fattening::class, 'id_kambing');
    }

    public function recordLogs(): HasMany
    {
        return $this->hasMany(RecordLog::class, 'id_kambing');
    }

    public function marketings(): HasMany
    {
        return $this->hasMany(Marketing::class, 'id_kambing');
    }
}
