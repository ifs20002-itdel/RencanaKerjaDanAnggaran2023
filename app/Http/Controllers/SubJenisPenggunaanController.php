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
    public function create($id){
        $jenispenggunaan = Jenispenggunaan::findOrFail($id);
        return view('workplan.subjenispenggunaan.create', compact('jenispenggunaan'));
    }

    public function store(Request $request){
        $request->validate([
            'namaSubJenisPenggunaan' => 'required',
        ],
        [
            'namaSubJenisPenggunaan.required' => 'Nama Sub Jenis Anggaran Harus Di Isi',
        ]);
       
        $SubJenisPenggunaan = new SubJenisPenggunaan;
        $SubJenisPenggunaan->namaSubJenisPenggunaan = $request->namaSubJenisPenggunaan;
        $SubJenisPenggunaan->jenispenggunaan_id = $request->jenispenggunaan_id;
        $SubJenisPenggunaan->save();

        return redirect('/jp');
    }

    public function destroy($id){
        DB::table('subjenispenggunaan')->where('id', '=', $id)->delete();
        return redirect('/jp');
    }
}
