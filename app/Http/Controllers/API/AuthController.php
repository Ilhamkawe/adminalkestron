<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    //
    public function checkUser(Request $req){

        $validation = Validator::make($req->only('email','password'), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $verif = $req->only('email','password');
        if($validation->fails()){
            
            $data = $validation->errors();   
            return ResponseFormatter::error('Login Gagal',$data);
        
        }else{
            
            $user =  CustomerModel::where('email',$verif['email'])
            ->limit(1)
            ->get();
    
            if($user[0]->email == $verif['email']){
                if(Hash::check($verif['password'], $user[0]->password)){
                    $userInfo = [
                        "id" => $user[0]->id,
                        "Nama" => $user[0]->nama,  
                        "alamat" => $user[0]->alamat,  
                        "provinsi" => $user[0]->provinsi,
                        "kota" => $user[0]->kota,
                        "kode_pos" => $user[0]->kode_pos,
                        "email" => $user[0]->email,  
                        "no_telp" => $user[0]->no_telp,  
                        "api_token" => $user[0]->api_token,  
                        "prov_index" =>$user[0]->prov_index 
                    ];
                    return ResponseFormatter::success('Login Sukses', $userInfo);
                }
            }

            return ResponseFormatter::error('Login Gagal',null, 400);
        }

        
    }

    public function register(Request $req){

        $validation = Validator::make($req->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:App\Models\CustomerModel,email',
            'password' => 'required'
        ]);
        
        $data = $req->all();
        
        if($validation->fails()){
        
            $data = $validation->errors();   
            return ResponseFormatter::error('Daftar Gagal',$data);
        
        }else{

            $data['password'] = Hash::make($req->password,['rounds' => 8]);
            $data['api_token'] = bcrypt($data['email']);
            CustomerModel::create($data);
            return ResponseFormatter::success('Berhasil Daftar', $data);

        }

    }

    public function update(Request $req, $id){

        $validation = Validator::make($req->all(), [
            'nama' => 'required',
            // 'password' => 'required', 
        ]);

        $data = $req->all();

        if($validation->fails()){
            $data = $validation->errors();   
            return ResponseFormatter::error('Update Gagal',$data);
        }else{
            // $data['password'] = Hash::make($req->password,['rounds' => 8]);
            CustomerModel::find($id)->update($data);
            return ResponseFormatter::success('Berhasil Update', $data);
        }

    }

    public function changePassword(Request $req, $id){


        // request password baru
        $password = $req->pwBaru;

        // cari data dengan id dan password yang di request
        $customer = CustomerModel::where('id',$id);
        $pwLama = $customer->get("password");

        if(Hash::check($req->pwLama, $pwLama[0]->password)){
            // jika password lama benar 
            // ambil password baru lalu hash 
            $password = Hash::make($password,['rounds' => 8]);
            // update password 
            $customer->update([
                'password' => $password
            ]);
            // return response
            return ResponseFormatter::success('berhasil di update', null);

        }else {
            // jika password lama salah 
            // return response
            return ResponseFormatter::error('Password Lama Salah', null);

        }


    }

    
}
