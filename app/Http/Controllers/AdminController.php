<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanAdminDataTable;
use App\DataTables\PengajuanAdminDataTable;
use App\Models\PengajuanPinjaman;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        return view('admin.index', compact('request'));
    }

    public function cekPengajuan(PengajuanAdminDataTable $datatable){
        return $datatable->render('admin.konfirmasiPengajuan');
    }

    public function konfirmasiPengajuan(string $id){
        PengajuanPinjaman::find($id)->update([
            'status_admin' => 'Dikonfirmasi',
        ]);

        return redirect(route('konfirmasiPengajuanAdm'));
    }

    public function laporan(LaporanAdminDataTable $datatable){
        return $datatable->render('admin.laporan');
    }
}
