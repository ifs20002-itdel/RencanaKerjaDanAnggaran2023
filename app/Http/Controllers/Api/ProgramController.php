<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Pejabat;
use App\Models\Program;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use App\Http\Helper;

class ProgramController extends Controller
{
    use Helper;

    public function index() {

    }

    public function create() {

    }

    public function store(Request $request): JsonResponse {
        $validasi = Validator::make($request->all(),[
            'tahun_id' => 'required',
            'mataanggaran_id' => 'required',
            'namaProgram' => 'required',
            'tujuan' => 'nullable',
            'deskripsi' => 'nullable',
            'waktu' => 'required',
            'satuan_id' => 'required',
            'volume' => 'required',
            'hargaSatuan' => 'required',
            'hargaTotal' => 'required',
            'user_id' => 'required',
            'unit_id' => 'required',
            'jabatan_id' => 'required',
            'status' => 'required',

        ]);

        if ($validasi->fails()) {
            return $this->error($validasi->errors()->first());
        }

        $program = Program::create($request->all());
        return $this->success($program);
        //
    }

    public function show($id) {
        $program = Program::where('program_id', $id)->get();
        return $this->success($program);
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        $program = Program::where('program_id', $id)->first();
        if ($program) {
            $program->update($request->all());
            return $this->success($program);
        } else {
            return $this->error("Program tidak ditemukan");
        }
    }

    public function destroy($id) {
        $program = Program::find($id)->delete();
        if ($program) {
            return $this->success($program, "Program berhasil dihapus");
        } else {
            return $this->error("Program tidak ditemukan");
        }
    }
}
