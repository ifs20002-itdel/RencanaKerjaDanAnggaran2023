<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jenispenggunaan;
use App\Models\SubJenisPenggunaan;
use App\Models\MataAnggaran;
use App\Models\Workgroup;

class ProgramController extends Controller
{
    public function create(){
        $mataanggaran = MataAnggaran::all();
        $mataanggaranData = MataAnggaran::get();
        $mataanggaran = [];
        
        foreach($mataanggaranData as $mata){
            $workgroup = json_decode($mata->workgroup_id, true);
            $mataanggaran[$mata->id] = [
                'id' => $mata->id,
                'mataAnggaran' => $mata->mataAnggaran,
                'namaAnggaran' => $mata->namaAnggaran,
                'jenispenggunaan_id' => $mata->jenispenggunaan_id,
                'subjenispenggunaan_id' => $mata->subjenispenggunaan_id,
                'workgroup_id' => $workgroup,
            ];

        }
        $workgroup = Workgroup::get();
        $workgroupData = [];
    
        foreach ($workgroup as $group) {
            $unit = json_decode($group->unit, true);
            $workgroupData[$group->id] = [
                'id' => $group->id,
                'nama' => $group->nama,
                'controller' => $group->controller,
                'unit' => $unit,
            ];
        }
        return view('RKA.create', compact('mataanggaran', 'mataanggaran', 'workgroupData'));
    }
}
