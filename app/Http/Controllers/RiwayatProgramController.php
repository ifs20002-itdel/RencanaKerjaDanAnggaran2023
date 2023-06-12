<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatProgram;
use App\Helpers\AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class RiwayatProgramController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'review' => 'required',
        ],
        [
            'review.required' => 'Review Tidak Boleh Kosong',
        ]);

        $riwayatprogram = new RiwayatProgram;

        $riwayatprogram->review = $request->review;
        $riwayatprogram->program_id = $request->program_id;
        $riwayatprogram->controller = Auth::user()->pegawai->pejabat->first()->jabatan_id;
        $riwayatprogram->user_id = Auth::user()->user_id;

        $riwayatprogram->save();
        return redirect()->back();
    }
}
