<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanAdminDataTable;
use App\DataTables\PengajuanAdminDataTable;
use App\DataTables\RuanganDataTable;
use App\Models\PengajuanPinjaman;
use App\Models\PinjamanRuangan;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Whoops\Run;

class AdminController extends Controller
{
    public function index(Request $request){
        return view('admin.index', compact('request'));
    }

    public function listRuangan(RuanganDataTable $datatable){
        return $datatable->render('admin.ruangan');
    }

    public function tambahRuangan(){
        return view('admin.tambahRuangan');
    }

    public function simpanRuangan(Request $request){
        $foto = $request->file('foto');
        // dd($request->kode);
        $fotoName = uniqid() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('ruangan'), $fotoName);
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
            'kode' => 'required|string|min:3|unique:ruangans,kode',
            'nama'     => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
            'lantai' => 'required|integer',          // level_id harus diisi dan berupa angka
        ]);

        Ruangan::create([
            'kode' => $request->kode,
            'nama'     => $request->nama,  
            'lantai' => $request->lantai, 
            'foto' =>  $fotoName
        ]);
        return redirect('/admin/ruangan')->with("message", "Success");
    }

    public function hapus(string $id) {
        $check = Ruangan::find($id);
        if (!$check) {      // untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/admin/ruangan')->with('error', 'Data user tidak ditemukan');
        }

        try {
            // Ruangan::destroy($id);
            $hapus = Ruangan::find($id);
            $hapus->delete();

            return redirect('/admin/ruangan')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/admin/ruangan')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function cekPengajuan(PengajuanAdminDataTable $datatable){
        return $datatable->render('admin.cekPengajuan');
    }

    public function detailPengajuan(string $id){
        $data = PengajuanPinjaman::find($id);

        return view('admin.detailPengajuan', ['data' => $data]);
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

        return view('admin.konfirmasiPengajuan', ['data' => $data]);
    }
    
    public function simpanKonfirmasi(Request $request, string $id) {
        PengajuanPinjaman::find($id)->update([
            'status_admin' => $request->status
        ]);

        if ($request->status === 'tidak diterima') {
            $note = $request->note;
            $data = PengajuanPinjaman::find($id);

            PengajuanPinjaman::find($id)->update([
                'status_urt' => 'Tidak Diterima'
            ]);

            PinjamanRuangan::create([
                'pengajuan_pinjaman_id' => $data->id,
                'tanggal_approval' => Carbon::now()->format('Y-m-d'),
                'catatan' => $note
            ]);
        } else {
            $note = '';
        }

        return redirect('admin/cekPengajuan');
    }

    public function laporan(LaporanAdminDataTable $datatable){
        return $datatable->render('admin.laporan');
    }
}
