<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Workgroup;
use App\Models\Pejabat;
use App\Models\Unit;


class WorkgroupController extends Controller
{

    public function wgindex(){
        $pejabat = Pejabat::all();
      
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
    
        return view('workgroup.index', compact('workgroupData', 'pejabat'));
    }

    public function wgcreate(){
        $pejabat = Pejabat::all();
        $unit = Unit::all();
        return view('workgroup.create', compact('pejabat', 'unit'));
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
        $pejabat = Pejabat::all();
        $unitDB = Unit::all();
        $workgroup = DB::table('workgroup')->where('id', $id)->first();
        $unit = json_decode($workgroup->unit, true);
        $workgroupData = [
            'id' => $workgroup->id,
            'nama' => $workgroup->nama,
            'controller' => $workgroup->controller,
            'unit' => $unit,
        ];
    
        return view('workgroup.edit', compact('workgroupData', 'pejabat', 'unitDB'));
    }


    public function wgupdate(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'controller' => 'required',
            'unit' => 'required',
        ], 
        [
            'nama.required' => 'Nama Organisasi harus diisi',
            'controller.required' => 'Pilih Controller',
            'unit.required' => 'Silahkan Pilih Unit',
        ]);

        $input = $request->input('unit');
        $inputJson = json_encode($input, true);

        $workgroup = Workgroup::find($id);
        $workgroup->nama = $request->nama;
        $workgroup->controller = $request->controller;
        $workgroup->unit = $inputJson;

        $workgroup->save();
    
        return redirect('/workgroup');
    }




    public function wgdestroy($id){
        DB::table('workgroup')->where('id', '=', $id)->delete();
        return redirect('/workgroup');
    }


}
