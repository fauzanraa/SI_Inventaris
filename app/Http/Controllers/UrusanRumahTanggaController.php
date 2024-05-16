<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanUrtDataTable;
use App\DataTables\PengajuanUrtDataTable;
use App\Models\PengajuanPinjaman;
use Illuminate\Http\Request;

class UrusanRumahTanggaController extends Controller
{
    public function index(Request $request){
        return view('urt.index', compact('request'));
    }

    public function cekPengajuan(PengajuanUrtDataTable $datatable){
        return $datatable->render('urt.konfirmasiPengajuan');
    }

    public function konfirmasiPengajuan(string $id){
        PengajuanPinjaman::find($id)->update([
            'status_rumah_tangga' => 'Dikonfirmasi',
        ]);

        return redirect(route('konfirmasiPengajuanUrt'));
    }

    public function laporan(LaporanUrtDataTable $datatable){
        return $datatable->render('urt.laporan');

    }
}
