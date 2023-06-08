<?php

namespace App\Http\Controllers;

use App\Helpers\AuthUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Penggunaan;
use App\Models\Pengajuan;
use GuzzleHttp\Message\Response;
use App\Models\Unit;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'usernameLogin' => 'required',
        'passwordLogin' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $username = $request->input('usernameLogin');
    $password = $request->input('passwordLogin');

    $response = Http::asForm()->post('https://cis-dev.del.ac.id/api/jwt-api/do-auth', [
        'username' => $username,
        'password' => $password,
    ])->body();

    $json = json_decode($response, true);

    if ($json['result'] == true) {
        // Successful login logic
        $user = $json['user'];
        $token = $json['token'];
        $refreshToken = $json['refresh_token'];

        // Store the user data in session
        session(['user' => $user]);
        session(['token' => $token]);
        session(['refresh_token' => $refreshToken]);

        $token = session('token');
        $responseDataPegawai = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/pegawai?userid=' . session('user')['user_id'])->body();
        $pegawai = json_decode($responseDataPegawai, true);

        foreach ($pegawai['data']['pegawai'] as $item) {
            $pegawaiId = $item['pegawai_id'];
        }

        //GetDataUnit
        $responseDataUnit = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/unit?userid=' . session('user')['user_id'])->body();
        $unit = json_decode($responseDataUnit, true);

        foreach ($unit['data']['unit'] as $unitNya) {
            if ($pegawaiId == $unitNya['pegawai_id']) {
                $userUnit = $unitNya['name'];
            }
        }

        session(['unit' => $userUnit]);


        return redirect('/');

    } else {
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
        return redirect('/user/login');
    }
}
