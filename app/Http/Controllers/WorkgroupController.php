<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Workgroup;


class WorkgroupController extends Controller
{

    public function wgindex(){
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
    
        return view('workgroup.index', compact('workgroupData'));
    }

    public function wgcreate(){
        return view('workgroup.create');
    }
    
    public function wgstore(Request $request){
        $request->validate([
            'nama' => 'required',
            'controller' => 'required',
            'unit' => 'required',
        ],
        [
            'nama' => 'Nama Organisasi Harus Diisi',
            'controller' => 'Pilih Controller',
            'unit' => 'Silahkan Pilih Unit',
        ]);

        $input = $request->input('unit');
        $inputJson = json_encode($input, true);

        $workgroup = new Workgroup();
        $workgroup->nama = $request->nama;
        $workgroup->controller = $request->controller;
        $workgroup->unit = $inputJson;

        $workgroup->save();
        
        return redirect('/workgroup');

    }

    public function wgedit($id){

        $workgroup = Workgroup::get()->where('id', $id)->first();
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
        
        return view('workgroup.edit', compact('workgroupData')); //namaVariabel
    }

    public function wgdestroy($id){
        DB::table('workgroup')->where('id', '=', $id)->delete();
        return redirect('/workgroup');
    }


}
