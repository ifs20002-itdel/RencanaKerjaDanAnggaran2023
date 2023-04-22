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
            return $this->getDataDosen($json['user']['user_id'], $token);
        } else {
            return redirect()->back()->withInput()->withErrors(['message' => 'Incorrect username or password']);
        }
        

    }

    function getDataDosen($userId, $token) {
        $responseDataDosen = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/dosen?userid='.$userId)->body();
        $jsonDataDosen = json_decode($responseDataDosen, true);
        
        $nama = $jsonDataDosen['data']['dosen'][0]['nama'];
        $prodi = $jsonDataDosen['data']['dosen'][0]['prodi'];
        $email = $jsonDataDosen['data']['dosen'][0]['email'];
        $nidn = $jsonDataDosen['data']['dosen'][0]['nidn'];
        $nip = $jsonDataDosen['data']['dosen'][0]['nip'];   
        $jabatanFungsional = $jsonDataDosen['data']['dosen'][0]['jabatan_akademik_desc'];
        $pegawaiId = $jsonDataDosen['data']['dosen'][0]['pegawai_id'];


        $responseStatusKeaktifan = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/pegawai?pegawaiid='.$pegawaiId)->body();
        $jsonKeaktifan = json_decode($responseStatusKeaktifan, true);
        $keaktifanDosen = $jsonKeaktifan['data']['pegawai'][0]['status_pegawai'];
        

        $cekApakahAdaId = User::where('id', '=', $userId)->exists();

        $dataUser = new User;
        $dataUser->id = $userId;
        $dataUser->nama = $nama;
        $dataUser->prodi = $prodi;
        $dataUser->email = $email;
        $dataUser->nidn = $nidn;
        $dataUser->nip = $nip;
        $dataUser->jabatan_fungsional = $jabatanFungsional;
        $dataUser->keaktifan = $keaktifanDosen;

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
