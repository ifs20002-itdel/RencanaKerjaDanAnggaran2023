<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SubJenisPenggunaan;
use App\Models\Jenispenggunaan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;



class SubJenisPenggunaanController extends Controller
{
    public function create(){
        $jenispenggunaan = Jenispenggunaan::all();
        return view('workplan.subjenispenggunaan.create', compact('jenispenggunaan'));
    }

    public function store(Request $request){
        $request->validate([
            'jenispenggunaan_id' => 'required',
            'namaSubJenisPenggunaan' => 'required',
        
        ],
        [
            'jenispenggunaan_id.required' => 'Silahkan Pilih Jenis Penggunaan',
            'namaSubJenisPenggunaan.required' => 'Nama Sub Jenis Anggaran Harus Di Isi',
        ]);
       
        $subjenispenggunaan = new SubJenisPenggunaan;
        $subjenispenggunaan->namaSubJenisPenggunaan = $request->namaSubJenisPenggunaan;
        $subjenispenggunaan->jenispenggunaan_id = $request->jenispenggunaan_id;
        $subjenispenggunaan->save();

        return redirect('/jp');
    }

    public function edit($id){
        $subjenispenggunaan = SubJenisPenggunaan::findOrFail($id);
        $jenispenggunaan = Jenispenggunaan::all();
        return view('workplan.subjenispenggunaan.edit', compact('subjenispenggunaan', 'jenispenggunaan')); //namaVariabel
    }

    public function update($id, Request $request){
        $request->validate([
            'jenispenggunaan_id' => 'required',
            'namaSubJenisPenggunaan' => 'required',
        
        ],
        [
            'jenispenggunaan_id.required' => 'Silahkan Pilih Jenis Penggunaan',
            'namaSubJenisPenggunaan.required' => 'Nama Sub Jenis Anggaran Harus Di Isi',
        ]);

        DB::table('subjenispenggunaan')->where('id', $id)->update(
            [
                'jenispenggunaan_id' => $request['jenispenggunaan_id'],
                'namaSubJenisPenggunaan' => $request['namaSubJenisPenggunaan']
            ]
        );
        return redirect('/jp');
    }

    public function destroy($id){
        DB::table('subjenispenggunaan')->where('id', '=', $id)->delete();
        return redirect('/jp');
    }
}
