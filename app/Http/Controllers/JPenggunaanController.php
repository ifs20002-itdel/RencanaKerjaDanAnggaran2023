<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JPenggunaanController extends Controller
{
    public function jpCreate(){
        return view('workplan.jPenggunaan.create');
    }

    public function jpStore(Request $request){
        $request->validate([
            'namaJenisPenggunaan' => 'required',
        ],
        [
            'namaJenisPenggunaan.required' => 'Nama Jenis Anggaran Harus Di Isi',
        ]);
        DB::table('jenispenggunaan')->insert(
            [
                'namaJenisPenggunaan' => $request['namaJenisPenggunaan']
            ]
        );
        return redirect('/jp');
    }


}