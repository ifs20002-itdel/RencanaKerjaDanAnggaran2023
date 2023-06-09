<?php

namespace App\Http\Controllers;

use App\Helpers\AuthUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use App\Models\Penggunaan;
use App\Models\Pengajuan;
use GuzzleHttp\Message\Response;
use App\Models\Unit;
use App\Models\Pegawai;
use App\Models\Pejabat;


class LoginController extends Controller
{
    public function login(Request $request)
    {

    $username = $request->input('usernameLogin');
    $password = $request->input('passwordLogin');

    $response = Http::asForm()->post('https://cis-dev.del.ac.id/api/jwt-api/do-auth', [
        'username' => $username,
        'password' => $password,
    ])->body();

    $json = json_decode($response, true);

    if ($json['result'] == true && $json['user']['status'] = 1) {

        $token = $json['token'];
        //getDataUser
        $user_id = $json['user']['user_id'];
        $email = $json['user']['email'];
        
        //CheckIfUserAlreadyExists
       
        //InsertData
        $dataUser = new User;
        $dataUser->user_id = $user_id;
        $dataUser->email = $email;
        //SaveDataWithValidations
        $cekApakahAdaId = User::where('user_id', '=', $user_id)->exists();
        if (!$cekApakahAdaId) {
            $dataUser->save();
        } else {
            $dataUser->update();
        }

        //Pegawai
        $requestPegawai = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/pegawai?userid='.$user_id)->body();
        $pegawai = json_decode($requestPegawai, true);

        $pegawai_id = $pegawai['data']['pegawai'][0]['pegawai_id'];
        $nip = $pegawai['data']['pegawai'][0]['nip'];
        $nama = $pegawai['data']['pegawai'][0]['nama'];
        $email = $pegawai['data']['pegawai'][0]['email'];
        $user_id = $pegawai['data']['pegawai'][0]['user_id'];

        $cekApakahAdaIdPegawai = Pegawai::where('pegawai_id', '=', $pegawai_id)->exists();

        $dataPegawai = new Pegawai;
        $dataPegawai->pegawai_id = $pegawai_id;
        $dataPegawai->nip = $nip;
        $dataPegawai->nama = $nama;
        $dataPegawai->email = $email;
        $dataPegawai->user_id = $user_id;

        // Cek apakah data sudah ada di dalam database, jika belum akan dibuat data baru di dalam database
        if (!$cekApakahAdaIdPegawai) {
            $dataPegawai->save();
        }else {
            $dataPegawai->update();
        }

        //Pejabat
        $responseDataPejabat = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/list-pejabat');
        $pejabat = json_decode($responseDataPejabat, true);

        $data = $pejabat['data']['pejabat'];

        foreach ($data as $item) {
            $pegawai_id = $item['pegawai_id'];
            $nama = $item['nama'];
            $jabatan_id = $item['jabatan_id'];
            $jabatan = $item['jabatan'];

            $cekApakahAdaJabatanId = Pejabat::where('jabatan_id', '=', $jabatan_id)->exists();

            $dataPejabat = new Pejabat;
            $dataPejabat->pegawai_id = $pegawai_id;
            $dataPejabat->nama = $nama;
            $dataPejabat->jabatan_id = $jabatan_id;
            $dataPejabat->jabatan = $jabatan;

            if (!$cekApakahAdaJabatanId) {
                $dataPejabat->save();
            }else {
                $dataPejabat->update();
            }
            
        }

        //Unit
        $responseDataUnit = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/unit');
        $unit = json_decode($responseDataUnit, true);
        $dataUnit = $unit['data']['unit'];

        foreach ($dataUnit as $itemUnit) {
            $unit_id = $itemUnit['unit_id'];
            $name = $itemUnit['name'] === '-' ? null : $itemUnit['name'];;
            $inisial = $itemUnit['inisial'] === '-' ? null : $itemUnit['inisial'];;
            $kepala_id = $itemUnit['kepala_id'] === '-' ? null : $itemUnit['kepala_id'];
            $kepala = $itemUnit['kepala'] === '-' ? null : $itemUnit['kepala'];
            $pegawai_id = $itemUnit['pegawai_id'] === '-' ? null : $itemUnit['pegawai_id'];
            $nama = $itemUnit['nama'] === '-' ? null : $itemUnit['nama'];;

            $cekApakahAdaUnitId = Unit::where('unit_id', '=', $unit_id)->exists();

            if (!$cekApakahAdaUnitId) {
                Unit::create([
                    'unit_id' => $unit_id,
                    'name' => $name,
                    'inisial' => $inisial,
                    'kepala_id' => $kepala_id,
                    'kepala' => $kepala,
                    'pegawai_id' => $pegawai_id,
                    'nama' => $nama,
                ]);
            } else {
                $existingUnit = Unit::where('unit_id', '=', $unit_id)->first();
                $existingUnit->update([
                    'name' => $name,
                    'inisial' => $inisial,
                    'kepala_id' => $kepala_id,
                    'kepala' => $kepala,
                    'pegawai_id' => $pegawai_id,
                    'nama' => $nama,
                ]);
            }
        }

        Auth::login($dataUser);
        return redirect('/');


        // $token = session('token');
        // $responseDataPegawai = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/pegawai?userid=' . session('user')['user_id'])->body();
        // $pegawai = json_decode($responseDataPegawai, true);

        // foreach ($pegawai['data']['pegawai'] as $item) {
        //     $pegawaiId = $item['pegawai_id'];
        // }

        // //GetDataUnit
        // $responseDataUnit = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/unit?userid=' . session('user')['user_id'])->body();
        // $unit = json_decode($responseDataUnit, true);

        // foreach ($unit['data']['unit'] as $unitNya) {
        //     if ($pegawaiId == $unitNya['pegawai_id']) {
        //         $userUnit = $unitNya['name'];
        //     }
        // }

        // session(['unit' => $userUnit]);

    }else {
        // Failed login logic
        return redirect('/user/login')->withErrors(['message' => 'Incorrect username or password']);
    }
}

public function profile()
{
    try {
        $Pengajuan = Pengajuan::all();
        $Penggunaan = Penggunaan::all();
        return view('pages.profile', compact('Pengajuan', 'Penggunaan'));
    } catch (QueryException $e) {
        Log::error('Terjadi kesalahan saat mengambil data dari database: ' . $e->getMessage());
        return response()->view('pages.error', [], 500);
    } catch (\Exception $e) {
        Log::error('Terjadi kesalahan pada saat memuat halaman profile: ' . $e->getMessage());
        return response()->view('pages.error', [], 500);
    }
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
