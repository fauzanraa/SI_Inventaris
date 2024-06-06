<?php

namespace App\Http\Controllers;

use App\DataTables\RuanganDataTable;
use App\DataTables\TandaTerimaDataTable;
use App\Models\PengajuanPinjaman;
use App\Models\PinjamanRuangan;
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

    public function cekRuangan(Request $request){
        $cari_ruangan = $request->nama_ruangan;
        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_selesai;

        if($request->has('nama_ruangan')){
            $ruangan = DB::select("
                    SELECT * FROM ruangans
                    WHERE nama LIKE '%".$cari_ruangan."%'        
            ");

            return view('mahasiswa.cekRuangan', ['ruangan' => $ruangan]);

        }if ($request->has('tanggal_mulai', 'tanggal_selesai')) {
            $ruangan = DB::select("
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
            
            return view('mahasiswa.cekRuangan', ['ruangan' => $ruangan]);

        } else {
            $ruangan = Ruangan::all();
            return view('mahasiswa.cekRuangan', ['ruangan' => $ruangan]);
        }
    }

    public function pencarianNama(Request $request){
        if($request->ajax()){
            $dataNama = DB::select("
                        SELECT * FROM ruangans
                        WHERE nama LIKE '%".$request->filter_nama."%'        
                    ");

            $output = '';
            if(count($dataNama)>0){
                    foreach ($dataNama as $item)
                    $output .='
                    <ul class="ruangan" id="ruangan">
                        <li>
                            <input type="checkbox" name="ruangan" id="'.$item->id.'">
                            <label for="'.$item->id.'">'.$item->nama.'</label>
                            <div class="content-ruangan">
                                <p> '.$item->kode.' | Lantai '.$item->lantai.'
                                    <br><br>
                                    <img src="'.asset("ruangan/".$item->foto).'" height="15%" width="50%">
                                </p>
                            </div>
                        </li>
                    </ul>';
            } else {
                $output = '
                <div class="hasil_pencarian">
                    <p>
                        Ruangan yang anda cari tidak ada
                    </p>
                </div>
                <br>
                ';
            }

            return $output;

        // $ruangan = Ruangan::all();
        // return view('mahasiswa.cekRuangan', ['ruangan' => $ruangan]);
        }
    }
    
    public function pencarianTanggal(Request $request){
        if($request->ajax()){
            $filter_tanggal_mulai = $request->input('filter_tanggal_mulai');
            $filter_tanggal_selesai = $request->input('filter_tanggal_selesai');

            $dataTanggal = DB::select("
                    SELECT * FROM ruangans 
                    WHERE id NOT IN(
                        SELECT pinjaman.pengajuan_pinjaman_id 
                        FROM pinjaman_ruangans AS pinjaman 
                        INNER JOIN pengajuan_pinjamans AS pengajuan 
                        ON pinjaman.pengajuan_pinjaman_id = pengajuan.id 
                        WHERE pengajuan.tanggal_mulai >= '".$filter_tanggal_mulai."' 
                        AND pengajuan.tanggal_selesai <= '".$filter_tanggal_selesai."'
                    )
                ");

            $output = '';
            if($filter_tanggal_mulai != '' || $filter_tanggal_selesai != ''){
                foreach ($dataTanggal as $item)
                    $output .='
                    <ul class="ruangan" id="ruangan">
                        <li>
                            <input type="checkbox" name="ruangan" id="'.$item->id.'">
                            <label for="'.$item->id.'">'.$item->nama.'</label>
                            <div class="content-ruangan">
                                <p> '.$item->kode.' | Lantai '.$item->lantai.'
                                    <br><br>
                                    <img src="'.asset("ruangan/".$item->foto).'" height="15%" width="50%">
                                </p>
                            </div>
                        </li>
                    </ul>';    
            } else {
                $dataTanggal = Ruangan::all();
                foreach ($dataTanggal as $item)
                    $output .='
                    <ul class="ruangan" id="ruangan">
                        <li>
                            <input type="checkbox" name="ruangan" id="'.$item->id.'">
                            <label for="'.$item->id.'">'.$item->nama.'</label>
                            <div class="content-ruangan">
                                <p> '.$item->kode.' | Lantai '.$item->lantai.'
                                    <br><br>
                                    <img src="'.asset("ruangan/".$item->foto).'" height="15%" width="50%">
                                </p>
                            </div>
                        </li>
                    </ul>';
            }

            return $output;

        // $ruangan = Ruangan::all();
        // return view('mahasiswa.cekRuangan', ['ruangan' => $ruangan]);
        }
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

    public function pengajuan(){
        $user = User::where('username', Auth::user()->username)->first();
        $ruangan = Ruangan::all();

        return view('mahasiswa.pengajuan', ['ruangan' => $ruangan, 'user' => $user]);
    }

    public function simpanPengajuan(Request $request){
        $dokumen = $request->file('dokumen');
        // dd($request->file($request->tanggal_mulai));
        $dokumenName = uniqid() . '.' . $dokumen->getClientOriginalExtension();
        $dokumen->move(public_path('dokumen'), $dokumenName);
        PengajuanPinjaman::create([
            'user_id' => DB::select("
                SELECT id FROM users WHERE nama LIKE '".$request->nama."'
            "),
            'ruangan' => $request->ruangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'dokumen_pendukung' => $dokumenName,
            'status_admin' => 'Menunggu',
            'status_urt' => 'Menunggu',
        ]);
        return redirect(route('indexMahasiswa'));
    }

    public function tandaTerima(TandaTerimaDataTable $dataTable){
        $user = User::where('username', Auth::user()->username)->first();
        dd($dataTable->render);

        if($user == true){
            return $dataTable->render('mahasiswa.tandaTerima');
        }
    }

    public function bukti(string $id){
        $data = DB::select("
            SELECT 
            pr.tanggal_approval, 
            u.nama as nama_user, 
            pp.tanggal_mulai, 
            pp.tanggal_selesai, 
            r.nama as nama_ruangan   
            FROM 
            pinjaman_ruangans AS pr
            INNER JOIN pengajuan_pinjamans AS pp
            ON pr.pengajuan_pinjaman_id = pp.id
            INNER JOIN users AS u
            ON pp.user_id = u.id
            INNER JOIN ruangans AS r
            ON pp.ruangan_id = r.id
            WHERE 
            pr.id = '".$id."';
        ");
        // dd($data);
        $tandaTerima = collect($data);
        

        return view('mahasiswa.buktiPeminjaman', ['tandaTerima' => $tandaTerima]);
    }

//     SELECT * FROM ruangans where id NOT IN (SELECT pinjaman.pengajuan_pinjaman_id FROM pinjaman_ruangans AS pinjaman INNER JOIN pengajuan_pinjamans AS pengajuan ON pinjaman.pengajuan_pinjaman_id = pengajuan.id WHERE pengajuan.tanggal_mulai >= '2024-05-19' AND pengajuan.tanggal_selesai <= '2024-05-19') 
}
