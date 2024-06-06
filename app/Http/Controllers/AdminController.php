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
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Whoops\Run;

class AdminController extends Controller
{
    public function index(){
        $pengajuan = DB::select("
                    SELECT COUNT(user_id) as notif
                    FROM pengajuan_pinjamans
                    WHERE status_admin = 'Menunggu';
        ");
        $notif = collect($pengajuan);

        return view('admin.index', ['notif' => $notif]);
    }

    public function listRuangan(RuanganDataTable $datatable){
        return $datatable->render('admin.ruangan');
    }

    public function tambahRuangan(){
        return view('admin.tambahRuangan');
    }

    public function simpanRuangan(Request $request){
        $request->validate([
            'kode' => 'required|string|min:3|unique:ruangans,kode',
            'nama'     => 'required|string|max:100', 
            'lantai' => 'required|integer',          
        //     'foto.*' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // DB::transaction(function () use ($request) {

            $ruangan = Ruangan::create([
                'kode' => $request->kode,
                'nama'     => $request->nama,  
                'lantai' => $request->lantai, 
            ]);

            if($request->hasFile('foto')) {
                foreach ($request->foto as $value) {

                    // $fotoName = time() . '_' . $value->getClientOriginalExtension();

                    // $value->move(public_path('ruangan'), $fotoName);
                    
                    // $foto[] = $fotoName;

                    $path = $value->store('public/ruangan');
                    $filename = basename($path);
                    $ruangan->ruanganImages()->create(['filename' => $filename]);
                }
            }
        // });
        
        return redirect('/admin/ruangan')->with("message", "Data ruangan berhasil ditambah");
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

            return redirect('/admin/ruangan')->with('message', 'Data ruangan berhasil dihapus');
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
        $request->validate([
            'status' => 'required',
        ]);

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

        return redirect('admin/cekPengajuan')->with('message', 'Berhasil melakukan konfirmasi');
    }

    public function laporan(LaporanAdminDataTable $datatable){
        return $datatable->render('admin.laporan');
    }
}
