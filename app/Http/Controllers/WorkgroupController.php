<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;


class WorkgroupController extends Controller
{
    public function wgindex(){
        return view('workgroup.create');
    }
    
    public function wgstore(Request $request){
        $request->validate([
            'nama' => 'required',
            'unit' => 'required',
        ],
        [
            'nama' => 'Nama Organisasi Harus Diisi',
            'unit' => 'Silahkan Pilih Unit',
        ]);

        $input = $request->unit;
        $input['unit'] = $request->input('unit');
     
       
        DB::table('workgroup')->insert(
            [
                'nama' => $request['nama'],
                'unit' => $dataUnit,
            ]
        );
        return redirect('/workgroup');

    }


}
