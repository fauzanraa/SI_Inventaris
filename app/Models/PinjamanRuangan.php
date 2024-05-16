<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PinjamanRuangan extends Model
{
    use HasFactory;

    protected $table = 'pinjaman_ruangans';
    protected $primaryKey = 'id';

    protected $fillable = ['pengajuan_id', 'username', 'nama', 'password', 'nim', 'recovery_code'];

    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(PengajuanPinjaman::class, 'id', 'pengajuan_id');
    }
}
