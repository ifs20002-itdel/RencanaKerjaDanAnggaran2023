<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jenispenggunaan;
use App\Models\SubJenisPenggunaan;
use App\Models\Workgroup;
use App\Models\MataAnggaran;


class MataAnggaranController extends Controller
{
    public function create(){
        $jenispenggunaan = Jenispenggunaan::all();
        $workgroup = Workgroup::all();
        return view('workplan.mataanggaran.create', compact('jenispenggunaan', 'workgroup'));
    }

    public function getSubJenisPenggunaan(Request $request)
    {
        $subjenispenggunaan = \DB::table('subjenispenggunaan')
            ->where('jenispenggunaan_id', $request->jenispenggunaan_id)
            ->get();
        
        if (count($subjenispenggunaan) > 0) {
            return response()->json($subjenispenggunaan);
        }
    }

    public function store(Request $request){
        $request->validate([
            'jenispenggunaan_id' => 'required',
            'mataAnggaran' => 'required',
            'namaAnggaran' => 'required',
            'unit' => 'required',
            'workgroup_id' => 'required',
        ],
        [
            'jenispenggunaan_id' => 'Silahkan Pilih Jenis Penggunaan',
            'mataAnggaran' => 'Mata Anggaran Harus Diisi',
            'namaAnggaran' => 'Nama Anggaran Harus Diisi',
            'unit' => 'Silahkan Pilih Unit',
            'workgroup_id' => 'Silahkan Pilih Organisasi Kerja'
        ]);

        $workgroup = $request->input('workgroup_id');
        $workgroup_id = json_encode($workgroup, true);

        $input = $request->input('unit');
        $unit = json_encode($input, true);

        $mataanggaran = new MataAnggaran();
        $mataanggaran->jenispenggunaan_id = $request->jenispenggunaan_id;
        $mataanggaran->subjenispenggunaan_id = $request->subjenispenggunaan_id;
        $mataanggaran->mataAnggaran = $request->mataAnggaran;
        $mataanggaran->namaAnggaran = $request->namaAnggaran;
        $mataanggaran->unit = $unit;
        $mataanggaran->workgroup_id = $workgroup_id;

        $mataanggaran->save();
        
        return redirect('/jp');

    }

    public function edit($id){
        $jenispenggunaan = Jenispenggunaan::all();
        $subjenispenggunaan = SubJenisPenggunaan::all();
        $workgroup = Workgroup::all();
        $mataanggaran = MataAnggaran::findOrFail($id);
        $unit = json_decode($mataanggaran->unit, true);
        $mataAnggaranData = [
            'unit' => $unit,
        ];

        return view('workplan.mataanggaran.edit', compact('jenispenggunaan', 'workgroup', 'mataanggaran', 'subjenispenggunaan', 'mataAnggaranData'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'jenispenggunaan_id' => 'required',
            'mataAnggaran' => 'required',
            'namaAnggaran' => 'required',
            'workgroup_id' => 'required',
            'unit' => 'required',
        ],
        [
            'jenispenggunaan_id' => 'Silahkan Pilih Jenis Penggunaan',
            'mataAnggaran' => 'Mata Anggaran Harus Diisi',
            'namaAnggaran' => 'Nama Anggaran Harus Diisi',
            'workgroup_id' => 'Silahkan Pilih Workgroup',
            'unit' => 'Silahkan Pilih Unit',
        ]);

        $workgroup = $request->input('workgroup_id');
        $workgroup_id = json_encode($workgroup, true);

        $input = $request->input('unit');
        $unit = json_encode($input, true);

        $mataanggaran = MataAnggaran::find($id);
        $mataanggaran->jenispenggunaan_id = $request->jenispenggunaan_id;
        $mataanggaran->subjenispenggunaan_id = $request->subjenispenggunaan_id;
        $mataanggaran->mataAnggaran = $request->mataAnggaran;
        $mataanggaran->namaAnggaran = $request->namaAnggaran;
        $mataanggaran->unit = $unit;
        $mataanggaran->workgroup_id = $workgroup_id;

        $mataanggaran->save();
        
        return redirect('/jp');

    }

    public function destroy($id){
        $mataanggaran = MataAnggaran::find($id)->delete();
        return redirect('/jp');
    }

}
