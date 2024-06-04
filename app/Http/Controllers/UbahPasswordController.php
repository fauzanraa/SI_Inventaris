<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UbahPasswordController extends Controller
{
    public function index(){
        $user = User::all();
        $users = $user->where('posisi_id', '3');
        $dataUser = collect($user);
        return view('login.lupaPassword', ['user' => $users]);
    }

    public function requestUbahPassword(Request $request, string $id){
        $request->validate([
            'username' => 'required|min:3',
            'recovery_code' => 'required|min:3|max:8',
        ]);

        $validasiUsername = User::where('username', $request->username)->exists();
        $validasiRecoveryCode = User::where('recovery_code', $request->recovery_code)->exists();
        if($validasiUsername && $validasiRecoveryCode){
            $data = User::find($id);
            return view('login.ubahPassword', ['data' => $data]);
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
        return redirect(route('login'));
    }
}
