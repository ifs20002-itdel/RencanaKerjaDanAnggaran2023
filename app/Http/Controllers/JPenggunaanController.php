<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jenispenggunaan;

class JPenggunaanController extends Controller
{
    public function JPenggunaan(){
        return view('workplan.jPenggunaan.index');
    }

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

    public function JPenggunaanIndex(){
        $Jenispenggunaan = DB::table('jenispenggunaan')->get();
        return view('workplan.jPenggunaan.index', compact('Jenispenggunaan'));
    }

    public function JPEdit($id){
        $Jenispenggunaan = DB::table('jenispenggunaan')->where('id', $id)->first();

        return view('workplan.jPenggunaan.edit', compact('Jenispenggunaan')); //namaVariabel
    }

    public function JPUpdate($id, Request $request){
        $request->validate([
            'namaJenisPenggunaan' => 'required',
        ],
        [
            'namaJenisPenggunaan.required' => 'Nama Jenis Anggaran Harus Di Isi',
        ]);
        DB::table('jenispenggunaan')->where('id', $id)->update(
            [
                'namaJenisPenggunaan' => $request['namaJenisPenggunaan']
            ]
        );
        return redirect('/jp');
    }

    public function JPDestroy($id){
        DB::table('jenispenggunaan')->where('id', '=', $id)->delete();
        return redirect('/jp');
    }


}