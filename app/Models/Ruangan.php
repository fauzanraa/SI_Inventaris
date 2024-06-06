<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangans';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'kode', 'nama', 'foto', 'lantai'];

    protected static function booted() {
        static::deleting(function ($ruangan) {
            foreach ($ruangan->ruanganImages as $image) {
                try {
                    $filePath = storage_path('app/public/ruangan/' . $image->filename);

                    if(file_exists($filePath)){
                        Storage::disk('public')->delete('ruangan/' . $image->filename);
                        $image->delete();
                    }
                } catch (\Exception $th) {
                    Log::error($th->getMessage());
                }
            }
        });
    }

    public function ruanganImages() {
        return $this->hasMany(RuanganImage::class);
    }
}
