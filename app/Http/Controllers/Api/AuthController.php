<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Pejabat;
use Illuminate\Support\Facades\Validator;
use App\Http\Helper;

class AuthController extends Controller
{
    use Helper;
    public function login(Request $request){
        $validasi = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required',
        ]);

        if($validasi->fails()){
             return $this->error($validasi->errors()->first());
        }

        $user = User::where('username', $request->username)->first();
        
        if($user){
            if(password_verify($request->password, $user->password)){
                $data = [
                    'user_id' => $user->user_id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'pegawai_id' => $user->pegawai->pegawai_id,
                    'nip' => $user->pegawai->nip,
                    'nama' => $user->pegawai->nama,
                    'emailPribadi' => $user->pegawai->email,
                    'alias' => $user->pegawai->alias,
                    'status_pegawai' => $user->pegawai->status_pegawai,
                    'unit_id' => $user->pegawai->unit->first()->unit_id,
                    'unit_name' => $user->pegawai->unit->first()->name,
                    'inisial_unit' => $user->pegawai->unit->first()->inisial,
                    'posisi' => $user->pegawai->unit->first()->kepala,
                    'jabatan_id' => $user->pegawai->pejabat->first()->jabatan_id,
                    'jabatan' => $user->pegawai->pejabat->first()->jabatan,
                ];
                return $this->success($data);
            }else{
                return $this->error("Password Salah");
            }
        }
        return $this->error('User tidak ditemukan'); 
    }

    //Public Success Messages
    
}
