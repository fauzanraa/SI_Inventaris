<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanUrtDataTable;
use App\DataTables\PengajuanUrtDataTable;
use App\Models\PengajuanPinjaman;
use App\Models\PinjamanRuangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrusanRumahTanggaController extends Controller
{
    public function index(){
        $pengajuan = DB::select("
                    SELECT COUNT(user_id) as notif
                    FROM pengajuan_pinjamans
                    WHERE status_admin = 'Diterima' AND status_urt = 'Menunggu';
        ");
        $notif = collect($pengajuan);

        return view('urt.index', ['notif' => $notif]);
    }

    public function cekPengajuan(PengajuanUrtDataTable $datatable){
        return $datatable->render('urt.cekPengajuan');
    }

    public function detailPengajuan(string $id){
        $data = PengajuanPinjaman::find($id);

        return view('urt.detailPengajuan', ['data' => $data]);
    }

    public function cekDokumen($filename){
        $path = public_path('/dokumen/'. $filename);

        if (!file_exists($path)) {
            return response()->json(['message' => 'File not found.'], 404);
        }

        return response()->file($path, ['Content-Type' => 'application/pdf']);
    }

    public function konfirmasiPengajuan(string $id){
        $data = PengajuanPinjaman::find($id);

        return view('urt.konfirmasiPengajuan', ['data' => $data]);
    }
    
    public function simpanKonfirmasi(Request $request, string $id) {
        $request->validate([
            'status' => 'required',
        ]);

        PengajuanPinjaman::find($id)->update([
            'status_urt' => $request->status
        ]);

        $data = PengajuanPinjaman::find($id);
        PinjamanRuangan::create([
            'pengajuan_pinjaman_id' => $data->id,
            'tanggal_approval' => Carbon::now()->format('Y-m-d'),
            'catatan' => 'Bisa Dipakai'
        ]);

        return redirect('urt/cekPengajuan')->with('message', 'Konfirmasi berhasil dilakukan');
    }

    public function laporan(LaporanUrtDataTable $datatable){
        return $datatable->render('urt.laporan');

    }
}
