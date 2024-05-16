<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function postLogin(Request $request){
        if(Auth::attempt($request->only('username','password'))){
            if(auth()->user()->posisi_id == 1 && 2){
                return redirect(route('indexMahasiswa'));
            }
            if(auth()->user()->posisi_id == 3){
                return redirect(route('homeStaff'));
            }
            // dd(auth()->user()->level_user);
        }
        return redirect(route('login'));
    }

    public function logOut(){
        Auth::logout();
        return redirect(route('login'));
    }
}
