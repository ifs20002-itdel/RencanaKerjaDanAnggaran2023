<?php

namespace App\Http\Controllers;

use App\Helpers\AuthUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Models\Penggunaan;
use App\Models\Pengajuan;


class LoginController extends Controller
{

    public function login(Request $request){

        $username = $request->usernameLogin;
        $password = $request->passwordLogin;


        $response = Http::asForm()->post('https://cis-dev.del.ac.id/api/jwt-api/do-auth', [
            'username' => $username,
            'password' => $password
        ])->body();

        $json = json_decode($response, true);
        if ($json['result'] == true) {
            $token = $json['token'];
            return $this->getDataPegawai($json['user']['user_id'], $token);
        } else {
            return redirect()->back()->withInput()->withErrors(['message' => 'Incorrect username or password']);
        }

    }

    function getDataPegawai($userId, $token) {
        $responseDataPegawai = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/pegawai?userid='.$userId)->body();
        $jsonDataPegawai = json_decode($responseDataPegawai, true);
        
        $pegawaiId = $jsonDataPegawai['data']['pegawai'][0]['pegawai_id'];
        $nip = $jsonDataPegawai['data']['pegawai'][0]['nip'];
        $nama = $jsonDataPegawai['data']['pegawai'][0]['nama'];
        $email = $jsonDataPegawai['data']['pegawai'][0]['email'];
        $username = $jsonDataPegawai['data']['pegawai'][0]['user_name'];
        $alias = $jsonDataPegawai['data']['pegawai'][0]['alias '];
        $status = $jsonDataPegawai['data']['pegawai'][0]['status_pegawai'];

        //Table User
        $cekApakahAdaId = User::where('id', '=', $userId)->exists();
        //inpu data in to table users
        $dataUser = new User;
        $dataUser->id = $userId;
        $dataUser->pegawai_id = $pegawaiId;
        $dataUser->nama = $nama;
        $dataUser->nip = $nip;
        $dataUser->alias = $alias;
        $dataUser->email = $email;
        $dataUser->username = $username;
        $dataUser->status = $status;
        

        // Cek apakah data sudah ada di dalam database, jika belum akan dibuat data baru di dalam database
        if (!$cekApakahAdaId) {
            $dataUser->save();
        }

        Auth::login($dataUser);
        return redirect('/');
    }

    public function profile(){
        $Pengajuan = Pengajuan::all();
        $Penggunaan = Penggunaan::all();
        return view('pages.profile', compact('Pengajuan', 'Penggunaan'));
    }

    function logout(Request $request) {
        Auth::logout();
        return redirect('/user/login');
    }

}
