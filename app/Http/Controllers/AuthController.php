<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function buatAkun(){
        $data = [
            'name'=> "Admin1",
            'email'=> "Admin@alkestron.com",
            'password' => bcrypt("Bandung00"),
        ];
        $user = User::create($data);
    }

    public function postLogin(Request $req){
        if(!auth()->attempt([
            'name' => $req->name, 
            'password' => $req->password
            ])){
                return redirect()->route('login')->with('error', 'Username Atau Password Salah');;
            }
            return redirect()->route('index');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }

}
