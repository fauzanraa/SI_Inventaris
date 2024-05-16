<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LupaPasswordController extends Controller
{
    public function index(){
        return view('login.lupaPassword');
    }

    public function requestUbahPassword(Request $request){
        if(Auth::attempt($request->only('username','recovery_code'))){
            if(auth()->user()->username == $request->username && auth()->user()->recovery_code == $request->recovery_code){
                $data = [
                    [
                        'user_id' => '',
                        'status' => 'Menunggu',
                        'created_at' => now()->format('Y-m-d'),
                    ],
                ];
                
                DB::table('ubah_password')->insert($data);
                return redirect(route('lupaPassword'));
            }
        }
    }
}
