<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tahun;

class TahunController extends Controller
{
    public function create()
    {
        return view('RKA.tahun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
        ], [
            'tahun.required' => 'Tahun Anggaran Harus Di Isi',
        ]);

        $tahun = new Tahun();
        $tahun->tahun = $request->tahun;
        $tahun->deskripsi = $request->deskripsi;
        $tahun->save();

        return redirect('/tahun')->with('success', 'Data berhasil ditambahkan');
    }

    public function index()
    {
        $tahun = Tahun::all();
        return view('RKA.tahun.index', compact('tahun'));
    }
  
    public function edit($id){
        $tahun = Tahun::find($id);

        return view('RKA.tahun.edit', compact('tahun')); //namaVariabel
    }

    public function update($id, Request $request) {
        $request->validate([
            'tahun' => 'required',
        ], 
        [
            'tahun.required' => 'Tahun Anggaran Harus Di Isi',
        ]);

        $tahun = Tahun::find($id);
        $tahun->tahun = $request->input('tahun');
        $tahun->deskripsi = $request->input('deskripsi');
        $tahun->save();

        return redirect('/tahun');
    }


}
