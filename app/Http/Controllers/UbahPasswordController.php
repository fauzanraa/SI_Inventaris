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
        return view('login.lupaPassword', ['user' => $user]);
    }

    public function ubahPassword(){
        return view('login.ubahPassword');
    }

    public function requestUbahPassword(Request $request){
        $validasiUsername = User::where('username', $request->username)->exists();
        $validasiRecoveryCode = User::where('recovery_code', $request->recovery_code)->exists();
        if($validasiUsername && $validasiRecoveryCode){
            $data = User::where('username', $request->username)->first();
            return view('login.ubahPassword', ['data' => $data]);
        }
    }

    public function simpanPassword(Request $request, string $username){
        $request->validate([
            'password' => 'required|min:3|max:12',
            'confirm_password' => 'required|same:password|min:3|max:12',
        ]);

        User::find($username)->update ([
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('login'));
    }
}
