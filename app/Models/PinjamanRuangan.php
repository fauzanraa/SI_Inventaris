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

    protected $fillable = ['pengajuan_id', 'username', 'nama', 'password', 'nim', 'recovery_code'];

    public function pengajuan(): HasOne
    {
        return $this->hasOne(PengajuanPinjaman::class, 'id', 'pengajuan_id');
    }

    public function tandaTerima(string $id){
    //     // $tandaTerima = DB::table('pinjaman_ruangans')
    //     //                     ->join('pengajuan_pinjamans', 'pinjaman_ruangans.pengajuan_id', '=', 'pengajuan_pinjamans.id')
    //     //                     ->select('pinjaman_ruangans.*', 'pengajuan_pinjamans.tanggal_mulai', 'pengajuan_pinjamans.tanggal_selesai')
    //     //                     ->get();

    //     // $search = Ruangan::whereNotIn('id', function($seleksi) use ($request->tanggal_mulai, $request->tanggal_selesai) {
    //     //     $seleksi->select('pinjaman_ruangans.id')
    //     //             ->from('pinjaman_ruangans')
    //     //             ->join('pinjaman_ruangans', 'pinjaman_ruangans.pengajuan_id' '=', 'pengajuan_pinjamans.id')
    //     //             ->where('pengajuan_pinjamans.tanggal_mulai', '>', $request->tanggal_mulai)
    //     //             ->where('pengajuan_pinjamans.tanggal_selesai', '>', $request->tanggal_selesai);
    //     // })->get();  

        // $tanggal_mulai = '2024-5-19';
        // $tanggal_selesai = '2024-5-19';
        // $search = DB::table('ruangans')->where($id, '!=', DB::table('pinjaman_ruangans')
        //                     ->join('pengajuan_pinjamans', 'pinjaman_ruangans.pengajuan_id', '=', 'pengajuan_pinjamans.id')
        //                     ->select('pengajuan_pinjaman.id', 'pengajuan_pinjamans.tanggal_mulai', '>' .$tanggal_mulai . 'pengajuan_pinjamans.tanggal_selesai', '<' .$tanggal_selesai)
        //                     ->get());

        // $search = DB::select('SELECT * FROM ruangans
        //                         where id NOT IN (SELECT pinjaman.id FROM pinjaman_ruangans AS pinjaman
        //                         ON pengajuan_pinjamans AS pengajuan ON pinjaman.pengajuan_id = pengajuan.id
        //                         AND pengajuan.tanggal_mulai > '.$tanggal_mulai.' AND pengajuan.tanggal_selesai
        //                         < '.$tanggal_selesai.'
        //                     ');                                        
                            
        // return $search;
    }
}
