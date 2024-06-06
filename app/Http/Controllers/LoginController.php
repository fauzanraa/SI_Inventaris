<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Alert;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function postLogin(Request $request){
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:3|max:12',
        ]);

        if(Auth::attempt($request->only('username','password'))){
            if(auth()->user()->posisi_id == 1){
                return redirect(route('indexAdmin'))->with('message', 'Berhasil Login');
            }
            if(auth()->user()->posisi_id == 2){
                return redirect(route('indexUrt'))->with('message', 'Berhasil Login');
            }
            if(auth()->user()->posisi_id == 3){
                return redirect(route('indexMahasiswa'))->with('message', 'Berhasil Login');
            }
        } else{
            return redirect(route('login'))->with('error', 'Gagal Login, masukkan Username dan Password dengan benar');
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect(route('login'));
    }
}
