<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuanganImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruangan_id',
        'filename'
    ];

    public function ruangan () {
        return $this->belongsTo(Ruangan::class);
    }
}
