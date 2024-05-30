<?php

namespace App\Http\Controllers;

use App\DataTables\RuanganDataTable;
use App\DataTables\TandaTerimaDataTable;
use App\Models\PengajuanPinjaman;
use App\Models\Ruangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index(){
        // $data = User::where('id', Auth::user()->id)->first();
        return view('mahasiswa.index');
    }

    public function cekRuangan(){
        $ruangan = Ruangan::all();
        return view('mahasiswa.cekRuangan', ['ruangan' => $ruangan]);
    }

    public function detailRuangan(Request $request){
        $ruangan = new Ruangan;

        if ($request->get('search')) {
            $ruangan = $ruangan->where('name', 'LIKE', '%' .$request->get('search'). '%');
        }

        $ruangan = $ruangan->get();

        return view('mahasiswa.cekRuangan', compact('ruangan'));
    }

    public function filterTanggal(Request $request){
        $inputTanggalMulai = $request->query('tanggal_mulai');
        $inputTanggalSelesai = $request->query('tanggal_selesai');

        // $tanggal_mulai = Carbon::createFromFormat('Y-m-d', $inputTanggalMulai)->format('Y-m-d');
        // $tanggal_selesai = Carbon::createFromFormat('Y-m-d', $inputTanggalSelesai)->format('Y-m-d');
        
        $ruangan = DB::select("
                    SELECT * FROM ruangans 
                    WHERE id NOT IN (
                        SELECT pinjaman.pengajuan_pinjaman_id 
                        FROM pinjaman_ruangans AS pinjaman 
                        INNER JOIN pengajuan_pinjamans AS pengajuan 
                        ON pinjaman.pengajuan_pinjaman_id = pengajuan.id 
                        WHERE pengajuan.tanggal_mulai >= '".$inputTanggalMulai."' 
                        AND pengajuan.tanggal_selesai <= '".$inputTanggalSelesai."'
                    )
                ");
        // dd($ruangan);
        // return view('mahasiswa.pengajuan', ['ruangan' => $ruangan]);
        return response()->json($ruangan, Response::HTTP_OK);
    }

    public function pengajuan(Request $request){
        $ruangan = Ruangan::all();

        return view('mahasiswa.pengajuan', ['ruangan' => $ruangan]);
    }

    public function cariRuangan(Request $request){
        $cari_ruangan = $request->nama_ruangan;
        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_selesai;

        if($request->has('nama_ruangan')){
            $pencarianRuangan = DB::select("
                    SELECT * FROM ruangans
                    WHERE nama LIKE '%".$cari_ruangan."%'        
            ");

            return view('mahasiswa.cariRuangan', ['pencarianRuangan' => $pencarianRuangan]);

        }if ($request->has('tanggal_mulai', 'tanggal_selesai')) {
            $pencarianRuangan = DB::select("
                    SELECT * FROM ruangans 
                    WHERE id NOT IN(
                        SELECT pinjaman.pengajuan_pinjaman_id 
                        FROM pinjaman_ruangans AS pinjaman 
                        INNER JOIN pengajuan_pinjamans AS pengajuan 
                        ON pinjaman.pengajuan_pinjaman_id = pengajuan.id 
                        WHERE pengajuan.tanggal_mulai >= '".$tanggal_mulai."' 
                        AND pengajuan.tanggal_selesai <= '".$tanggal_selesai."'
                    )
                ");
            
            return view('mahasiswa.cariRuangan', ['pencarianRuangan' => $pencarianRuangan]);

        } else {
            # code...
        }
    }

    public function simpanPengajuan(Request $request){
        $dokumen = $request->file('dokumen');
        // dd($request->file($request->tanggal_mulai));
        $dokumenName = uniqid() . '.' . $dokumen->getClientOriginalExtension();
        $dokumen->move(public_path('dokumen'), $dokumenName);
        PengajuanPinjaman::create([
            'nama' => $request->nama,
            'user_id' => '1',
            'ruangan' => $request->ruangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'dokumen_pendukung' => 'dokumen' .$dokumenName,
            'status_admin' => 'Menunggu',
            'status_urt' => 'Menunggu',
            
        ]);
        return redirect(route('indexMahasiswa'));
    }

    public function tandaTerima(TandaTerimaDataTable $dataTable){
        return $dataTable->render('mahasiswa.tandaTerima');
    }

//     SELECT * FROM ruangans where id NOT IN (SELECT pinjaman.pengajuan_pinjaman_id FROM pinjaman_ruangans AS pinjaman INNER JOIN pengajuan_pinjamans AS pengajuan ON pinjaman.pengajuan_pinjaman_id = pengajuan.id WHERE pengajuan.tanggal_mulai >= '2024-05-19' AND pengajuan.tanggal_selesai <= '2024-05-19') 
}
