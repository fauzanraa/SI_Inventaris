<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class PinjamanRuangan extends Model
{
    use HasFactory;

    protected $table = 'pinjaman_ruangans';
    protected $primaryKey = 'id';

    protected $fillable = ['pengajuan_pinjaman_id', 'tanggal_approval', 'catatan'];

    public function pengajuan(): HasOne
    {
        return $this->hasOne(PengajuanPinjaman::class, 'id', 'pengajuan_id');
    }

}
