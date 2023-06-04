<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jenispenggunaan;
use App\Models\SubJenisPenggunaan;
use App\Models\Workgroup;

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
}
