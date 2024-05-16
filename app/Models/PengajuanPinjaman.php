<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanPinjaman extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_pinjamans';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'tanggal_pinjam', 'tanggal_selesai', 'dokumen_pendukung', 'status_admin', 'status_urt'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
