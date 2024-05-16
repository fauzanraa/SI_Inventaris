<?php

namespace App\Http\Controllers;

use App\DataTables\RuanganDataTable;
use App\DataTables\TandaTerimaDataTable;
use App\Models\PengajuanPinjaman;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index(Request $request){
        return view('mahasiswa.index', compact('request'));
    }

    public function list(RuanganDataTable $dataTable){
        return $dataTable->render('mahasiswa.cekRuangan');
    } 

    public function detailRuangan(Request $request){
        $ruangan = new Ruangan;

        if ($request->get('search')) {
            $ruangan = $ruangan->where('name', 'LIKE', '%' .$request->get('search'). '%');
        }

        $ruangan = $ruangan->get();

        return view('mahasiswa.cekRuangan', compact('ruangan'));
    }

    public function pengajuan(){
        $ruangan = Ruangan::all();
        return view('mahasiswa.pengajuan', ['ruangan' => $ruangan]);
    }

    public function simpanPengajuan(Request $request){
        $dokumen = $request->file('dokumen');
        dd($request->file('dokumen'));
        $dokumenName = uniqid() . '.' . $dokumen->getClientOriginalExtension();
        $dokumen->move(public_path('dokumen'), $dokumenName);
        PengajuanPinjaman::create([
            'nama' => $request->nama,
            'ruangan' => $request->ruangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'dokumen' => 'dokumen' .$dokumenName,
            'status_admin' => 'Menunggu',
            'status_urt' => 'Menunggu',
            
        ]);
        return redirect(route('indexMahasiswa'));
    }

    public function tandaTerima(TandaTerimaDataTable $dataTable){
        return $dataTable->render('mahasiswa.tandaTerima');
    }
}
