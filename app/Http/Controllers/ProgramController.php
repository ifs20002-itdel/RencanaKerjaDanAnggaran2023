<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jenispenggunaan;
use App\Models\SubJenisPenggunaan;
use App\Models\MataAnggaran;
use App\Models\Workgroup;
use App\Models\Pegawai;
use App\Models\Pejabat;
use App\Models\Satuan;
use App\Models\Tahun;
use App\Models\Program;
use App\Helpers\AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

use App\Models\RiwayatProgram;


class ProgramController extends Controller
{
    public function accepted($id){
        $program = Program::find($id);
        $program->status='Accepted';
        $program->save();
        return redirect()->back();
    }

    public function rejected($id){
        $program = Program::find($id);
        $program->status='Rejected';
        $program->save();
        return redirect()->back();
    }

    public function index(){
        $program = Program::all();
        $tahun = Tahun::all();
        $mataanggaran = MataAnggaran::all();
        $pejabat = Pejabat::all();
        return view('RKA.index', compact('program', 'tahun', 'mataanggaran', 'pejabat'));
    }

    public function create(){
        $satuan = Satuan::all();
        $pegawai = Pegawai::all();
        $pejabat = Pejabat::all();
        $mataanggaranData = MataAnggaran::get();
        $mataanggaran = [];

        foreach($mataanggaranData as $mata){
            $workgroup = json_decode($mata->workgroup_id, true);
            $unit = json_decode($mata->unit, true);
            $mataanggaran[$mata->id] = [
                'id' => $mata->id,
                'mataAnggaran' => $mata->mataAnggaran,
                'namaAnggaran' => $mata->namaAnggaran,
                'jenispenggunaan_id' => $mata->jenispenggunaan_id,
                'subjenispenggunaan_id' => $mata->subjenispenggunaan_id,
                'controller' => $mata->controller,
                'unit' => $unit,
            ];

        }

        $tahun = Tahun::all();


        return view('RKA.create', compact('mataanggaran', 'pejabat', 'pegawai', 'satuan', 'tahun'));
    }

    public function store(Request $request){
        $request->validate([
            'tahun_id' => 'required',
            'mataanggaran_id' => 'required',
            'namaProgram' => 'required',
            'waktu' => 'required',
            'satuan_id' => 'required',
            'volume' => 'required',
            'hargaSatuan' => 'required', 
        ],
        [
            'tahun_id.required' => 'Pilih Tahun Anggaran',
            'mataanggaran_id.required' => 'Pilih Mata Anggaran',
            'namaProgram.required' => 'Nama Program/Kegiatan Harus Di Isi',
            'waktu.required' => 'Pilih Waktu Pelaksanaan',
            'satuan_id.required' => 'Pilih Satuan Program',
            'volume.required' => 'Volume Program',
            'hargaSatuan.required' => 'Harga Satuan Harus Di Isi',
        ]);

        $program = new Program;
        $program->namaProgram = $request->namaProgram;
        $program->tujuan = $request->tujuan;
        $program->deskripsi = $request->deskripsi;
        $program->volume = $request->volume;
        $program->hargaSatuan = $request->hargaSatuan;
        $program->hargaTotal = $request->hargaTotal;
        $program->tahun_id = $request->tahun_id;
        $program->satuan_id = $request->satuan_id;
        $program->mataanggaran_id = $request->mataanggaran_id;
        $program->status = $request->status;


        //Waktu Handling
        $input = $request->input('waktu');
        $inputJson = json_encode($input, true);
        $program->waktu = $inputJson;
        //Waktu Handling
        $program->user_id = Auth::user()->user_id;
        $program->unit_id = Auth::user()->pegawai->unit->first()->unit_id;
        $program->jabatan_id = Auth::user()->pegawai->pejabat->first()->jabatan_id;

        $program->save();

        return redirect('/program');

    }

    public function edit($id){
        $program = Program::findOrFail($id);
        $mataanggaranModel = MataAnggaran::all();
        $satuan = Satuan::all();
        $pegawai = Pegawai::all();
        $pejabat = Pejabat::all();
        $mataanggaranData = MataAnggaran::get();
        $mataanggaran = [];

        foreach($mataanggaranData as $mata){
            $workgroup = json_decode($mata->workgroup_id, true);
            $unit = json_decode($mata->unit, true);
            $mataanggaran[$mata->id] = [
                'id' => $mata->id,
                'mataAnggaran' => $mata->mataAnggaran,
                'namaAnggaran' => $mata->namaAnggaran,
                'jenispenggunaan_id' => $mata->jenispenggunaan_id,
                'subjenispenggunaan_id' => $mata->subjenispenggunaan_id,
                'controller' => $mata->controller,
                'unit' => $unit,
            ];

        }

        $tahun = Tahun::all();

        return view('RKA.edit', compact('mataanggaran', 'pejabat', 'pegawai', 'satuan', 'tahun', 'program', 'mataanggaranModel'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'tahun_id' => 'required',
            'mataanggaran_id' => 'required',
            'namaProgram' => 'required',
            'waktu' => 'required',
            'satuan_id' => 'required',
            'volume' => 'required',
            'hargaSatuan' => 'required', 
        ],
        [
            'tahun_id.required' => 'Pilih Tahun Anggaran',
            'mataanggaran_id.required' => 'Pilih Mata Anggaran',
            'namaProgram.required' => 'Nama Program/Kegiatan Harus Di Isi',
            'waktu.required' => 'Pilih Waktu Pelaksanaan',
            'satuan_id.required' => 'Pilih Satuan Program',
            'volume.required' => 'Volume Program',
            'hargaSatuan.required' => 'Harga Satuan Harus Di Isi',
        ]);

        $program = Program::find($id);
        $program->namaProgram = $request->namaProgram;
        $program->tujuan = $request->tujuan;
        $program->deskripsi = $request->deskripsi;
        $program->volume = $request->volume;
        $program->hargaSatuan = $request->hargaSatuan;
        $program->hargaTotal = $request->hargaTotal;
        $program->tahun_id = $request->tahun_id;
        $program->satuan_id = $request->satuan_id;
        $program->mataanggaran_id = $request->mataanggaran_id;
        $program->status = $request->status;


        //Waktu Handling
        $input = $request->input('waktu');
        $inputJson = json_encode($input, true);
        $program->waktu = $inputJson;
        //Waktu Handling
        $program->user_id = Auth::user()->user_id;
        $program->unit_id = Auth::user()->pegawai->unit->first()->unit_id;
        $program->jabatan_id = Auth::user()->pegawai->pejabat->first()->jabatan_id;

        $program->save();

        return redirect('/program');

    }
    public function show($id){
        $program = Program::find($id);
        $riwayatprogram = RiwayatProgram::where('program_id', $id)->get();
        return view('RKA.show', compact('program', 'riwayatprogram')); //namaVariabel
    }

    public function destroy($id){
        $program = Program::find($id)->delete();
        return redirect('/program');
    }

}
