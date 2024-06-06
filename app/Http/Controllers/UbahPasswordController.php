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

    public function requestUbahPassword(Request $request){
        $request->validate([
            'username' => 'required|min:3',
            'recovery_code' => 'required|min:3|max:8',
        ]);

        $username = $request->username;
        $validasiUsername = User::where('username', $request->username)->exists();
        $validasiRecoveryCode = User::where('recovery_code', $request->recovery_code)->exists();
        if($validasiUsername && $validasiRecoveryCode){
            $data = DB::select("
                SELECT id FROM users 
                WHERE username LIKE '%".$username."%'
            ");
            $datas = collect($data);
            return view('login.ubahPassword', ['data' => $datas]);
        } else {
            return view('login.lupaPassword');
        }
    }

    public function simpanPassword(Request $request, string $username){
        $request->validate([
            'password' => 'required|min:3|max:12',
            'confirm_password' => 'required|same:password',
        ]);

        User::find($username)->update ([
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('login'));
    }
}
