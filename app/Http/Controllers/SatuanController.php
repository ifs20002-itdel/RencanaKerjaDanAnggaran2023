<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;

class SatuanController extends Controller
{
    public function create()
    {
        return view('RKA.satuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ], [
            'nama.required' => 'Nama Satuan Harus Di Isi',
        ]);

        $satuan = new Satuan();
        $satuan->nama = $request->nama;
        $satuan->deskripsi = $request->deskripsi;
        $satuan->save();

        return redirect('/program/create')->with('success', 'Data berhasil ditambahkan');
    }

    public function index()
    {
        $satuan = Satuan::all();
        return view('RKA.satuan.index', compact('satuan'));
    }
  
    public function edit($id){
        $satuan = Satuan::find($id);

        return view('RKA.satuan.edit', compact('satuan')); //namaVariabel
    }

    public function update($id, Request $request) {
        $request->validate([
            'nama' => 'required',
        ], 
        [
            'nama.required' => 'Nama Satuan Harus Di Isi',
        ]);

        $satuan = Satuan::find($id);
        $satuan->nama = $request->input('nama');
        $satuan->deskripsi = $request->input('deskripsi');
        $satuan->save();

        return redirect('/satuan');
    }


}
