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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index(){
        $ruangan = Ruangan::with('ruanganImages')->get();

        return view('mahasiswa.index', ['ruangan' => $ruangan]);
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
            $ruangan = Ruangan::with('ruanganImages')->get();

            // dd($ruangan);
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
        if($request->hasFile('dokumen')) {
            $dokumen = $request->file('dokumen');
            // dd($request->file($request->tanggal_mulai));
            $dokumenName = uniqid() . '.' . $dokumen->getClientOriginalExtension();
            $dokumen->move(public_path('dokumen'), $dokumenName);           
        }
        
            
        PengajuanPinjaman::create([
            'user_id' => $request->id,
            'ruangan_id' => $request->ruangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'dokumen_pendukung' => $dokumenName,
            'status_admin' => 'Menunggu',
            'status_urt' => 'Menunggu',
        ]);
        return redirect(route('pengajuanMhs'))->with('message', 'Berhasil melakukan pengajuan');
    }

    public function tandaTerima(TandaTerimaDataTable $dataTable){
        $user = User::where('username', Auth::user()->username)->first();
        $userId = $user->id;

        $tandaTerima = DB::table('pinjaman_ruangans as pr')
                        ->select('pr.*', 'pp.tanggal_mulai', 'pp.tanggal_selesai', 'pp.status_admin', 'pp.status_urt')
                        ->join('pengajuan_pinjamans as pp', 'pr.pengajuan_pinjaman_id', '=', 'pp.id')
                        ->join('users as u', 'pp.user_id', '=', 'u.id')
                        ->where('u.id', $user->id)
                        ->paginate(10);

        return $dataTable->render('mahasiswa.tandaTerima', ['tandaTerima' => $tandaTerima]);
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
        $tandaTerima = collect($data);
        

        return view('mahasiswa.buktiPeminjaman', ['tandaTerima' => $tandaTerima]);
    }

}
