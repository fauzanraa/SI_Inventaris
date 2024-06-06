<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class RegisterController extends Controller
{
    public function index(){
        return view('login.register');
    }

    public function simpanRegistrasi(Request $request){
        $request->validate([
            'nama' => 'required|string|min:3',
            'nim' => 'required|max:10',
            'username' => 'required|min:3|unique:users,username',
            'password' => 'required|min:3|max:12',
            'confirm_password' => 'required|same:password',
            'recovery_code' => 'required|min:3|max:8',
        ]);

        $data = [
            [
                'posisi_id' => 3,
                'nama' => $request->nama,
                'nim' => $request->nim,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'recovery_code' => $request->recovery_code,
            ],
        ];

        // dd($data);
        
        DB::table('users')->insert($data);
        
        return redirect(route('login'))->with('message', 'Berhasil membuat akun');
    }
}
