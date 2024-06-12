<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UbahPasswordController extends Controller
{
    public function index(){
        return view('login.lupaPassword');
    }

    public function requestUbahPasswordView() {
        return view('login.ubahPassword');
    }

    public function requestUbahPassword(Request $request){
        $request->validate([
            'username' => 'required|min:3',
            'recovery_code' => 'required|min:3|max:8',
        ]);

        // dd($request->all());

        $username = $request->username;
        $validasiUsername = User::where('username', $request->username)->exists();
        $validasiRecoveryCode = User::where('recovery_code', $request->recovery_code)->exists();
        if($validasiUsername && $validasiRecoveryCode){
            $datas = DB::select("
                SELECT id FROM users 
                WHERE username LIKE '%".$username."%'
            ");
            $data = collect($datas);

            return view('login.ubahPassword', ['data'=> $data])->with('message', 'User ditemukan, silahkan ganti password');
        } else {
            return view('login.lupaPassword')->with('error', 'User tidak ditemukan');
        }
    }

    public function simpanPassword(Request $request, string $id){
        $request->validate([
            'password' => 'required|min:3|max:12',
            'confirm_password' => 'required|same:password',
        ]);

        User::find($id)->update ([
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('login'))->with('message', 'Berhasil ubah password, silahkan masuk');

    }
}
