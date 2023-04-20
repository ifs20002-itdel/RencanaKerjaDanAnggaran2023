<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggunaan;
use App\Models\Pengajuan;
use App\Models\Jabatan;

use App\Helpers\AuthUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class PengajuanController extends Controller
{
    public function approved($id){
        $Pengajuan = Pengajuan::find($id);
        $Pengajuan->status='Approved';
        $Pengajuan->save();
        return redirect()->back();
    }

    public function canceled($id){
        $Pengajuan = Pengajuan::find($id);
        $Pengajuan->status='Canceled';
        $Pengajuan->save();
        return redirect()->back();
    }
    

    public function Pengajuan(){
        $Pengajuan = Pengajuan::all();
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.index', compact('Pengajuan', 'Penggunaan'));
    }

    public function RKA(){
        $Pengajuan = Pengajuan::all();
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.RKA', compact('Pengajuan', 'Penggunaan'));
    }

    //===================================================================================================================================
    //Operasional Pendidikan
        //A.Dosen
        public function PDosenCreate(){
            $Penggunaan = Penggunaan::all();
            return view('workplan.pengajuan.pendidikan.a.create', compact('Penggunaan'));
        }

        public function PengajuanStore(Request $request){
            $request->validate([
                'penggunaan_id' => 'required',
                'rincianProgram' => 'required',
                'satuan' => 'required',
                'volume' => 'required',
                'hargaSatuan' => 'required',
                'start' => 'required',
                'finish' => 'required',
            ],
            [
                'penggunaan_id.required' => 'Pilih Jenis Penggunaan Anggaran',
                'rincianProgram.required' => 'Rincian Program Harus Di Isi',
                'satuan.required' => 'Satuan Harus Di Isi',
                'volume.required' => 'Volume Harus Di Isi',
                'hargaSatuan.required' => 'Harga Satuan Harus Di Isi',
                'start.required' => 'Waktu Mulai Harus Di Isi',
                'finish.required' => 'Waktu Selesai Harus Di Isi',
            ]);
            
            $Pengajuan = new Pengajuan;
            $Pengajuan->jenis = $request->jenis;
            $Pengajuan->rincianProgram = $request->rincianProgram;
            $Pengajuan->volume = $request->volume;
            $Pengajuan->satuan = $request->satuan;
            $Pengajuan->hargaSatuan = $request->hargaSatuan;
            $Pengajuan->total = $request->total;
            $Pengajuan->start = $request->start;
            $Pengajuan->finish = $request->finish;
            $Pengajuan->pemohon = $request->pemohon;

            $Pengajuan->status = $request->status;

            $Pengajuan->user_id = Auth::user()->id;
            $Pengajuan->penggunaan_id = $request->penggunaan_id;
            $Pengajuan->save();
            

            return redirect('/pengajuan');


        }

        public function PengajuanShow($id){
            $Pengajuan = Pengajuan::findOrFail($id);
            $Penggunaan = Penggunaan::all();
            return view('workplan.pengajuan.show', compact('Pengajuan', 'Penggunaan')); //namaVariabel
        }
        
        public function PengajuanShowOld($id){
            $Pengajuan = Pengajuan::findOrFail($id);
            $Penggunaan = Penggunaan::all();
            return view('workplan.pengajuan.showOld', compact('Pengajuan', 'Penggunaan')); //namaVariabel
        }

        public function PDosenEdit($id){
            $Pengajuan = Pengajuan::findOrFail($id);
            $Penggunaan = Penggunaan::all();
            return view('workplan.pengajuan.pendidikan.a.edit', compact('Pengajuan', 'Penggunaan')); //namaVariabel
        }

        public function PengajuanUpdate($id, Request $request){
            $request->validate([
                'penggunaan_id' => 'required',
                'rincianProgram' => 'required',
                'satuan' => 'required',
                'volume' => 'required',
                'hargaSatuan' => 'required',
                'start' => 'required',
                'finish' => 'required',
            ],
            [
                'penggunaan_id.required' => 'Pilih Jenis Penggunaan Anggaran',
                'rincianProgram.required' => 'Rincian Program Harus Di Isi',
                'satuan.required' => 'Satuan Harus Di Isi',
                'volume.required' => 'Volume Harus Di Isi',
                'hargaSatuan.required' => 'Harga Satuan Harus Di Isi',
                'start.required' => 'Waktu Mulai Harus Di Isi',
                'finish.required' => 'Waktu Selesai Harus Di Isi',
            ]);
        
            $Pengajuan = Pengajuan::find($id);

            $Pengajuan->jenis = $request->jenis;
            $Pengajuan->rincianProgram = $request->rincianProgram;
            $Pengajuan->volume = $request->volume;
            $Pengajuan->satuan = $request->satuan;
            $Pengajuan->hargaSatuan = $request->hargaSatuan;
            $Pengajuan->total = $request->total;
            $Pengajuan->start = $request->start;
            $Pengajuan->finish = $request->finish;
            $Pengajuan->pemohon = $request->pemohon;
            $Pengajuan->status = $request->status;
            $Pengajuan->user_id = Auth::user()->id;
            $Pengajuan->penggunaan_id = $request->penggunaan_id;
            $Pengajuan->save();
            
            return redirect('/pengajuan');
        }

        public function PengajuanDestroy($id){
            DB::table('pengajuan')->where('id', '=', $id)->delete();
            return redirect('/pengajuan');
        }
        public function RKADestroy($id){
            DB::table('pengajuan')->where('id', '=', $id)->delete();
            return redirect('/RKA');
        }


        //===================================================================================================================================
        //Operasional Pendidikan
        //B.Tenaga Kependidikan
        public function PGTKCreate(){
            $Penggunaan = Penggunaan::all();
            return view('workplan.pengajuan.pendidikan.b.create', compact('Penggunaan'));
        }
        public function PGTKEdit($id){
            $Pengajuan = Pengajuan::findOrFail($id);
            $Penggunaan = Penggunaan::all();
            return view('workplan.pengajuan.pendidikan.b.edit', compact('Pengajuan', 'Penggunaan')); //namaVariabel
        }

         //===================================================================================================================================
        //Operasional Pendidikan
        //C. Biaya Operasional Pembelajaran
        public function PPembelajaranCreate(){
            $Penggunaan = Penggunaan::all();
            return view('workplan.pengajuan.pendidikan.c.create', compact('Penggunaan'));
        }
        public function PPembelajaranEdit($id){
            $Pengajuan = Pengajuan::findOrFail($id);
            $Penggunaan = Penggunaan::all();
            return view('workplan.pengajuan.pendidikan.c.edit', compact('Pengajuan', 'Penggunaan')); //namaVariabel
        }

        //===================================================================================================================================
        //Operasional Pendidikan
        //D. Biaya Operasional Tidak Langsung
        public function PBOTLCreate(){
            $Penggunaan = Penggunaan::all();
            return view('workplan.pengajuan.pendidikan.d.create', compact('Penggunaan'));
        }
        public function PBOTLEdit($id){
            $Pengajuan = Pengajuan::findOrFail($id);
            $Penggunaan = Penggunaan::all();
            return view('workplan.pengajuan.pendidikan.d.edit', compact('Pengajuan', 'Penggunaan')); //namaVariabel
        }

    //===================================================================================================================================
    //2. Operasional Kemahasiswaan
        
    public function PKemahasiswaanCreate(){
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.kemahasiswaan.create', compact('Penggunaan'));
    }
    public function PKemahasiswaanEdit($id){
        $Pengajuan = Pengajuan::findOrFail($id);
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.kemahasiswaan.edit', compact('Pengajuan', 'Penggunaan')); //namaVariabel
    }

    //===================================================================================================================================
    //3. Biaya Penelitian
        
    public function PPenelitianCreate(){
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.penelitian.create', compact('Penggunaan'));
    }
    public function PPenelitianEdit($id){
        $Pengajuan = Pengajuan::findOrFail($id);
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.penelitian.edit', compact('Pengajuan', 'Penggunaan')); //namaVariabel
    }

    //===================================================================================================================================
    //4. Biaya PkM

    public function PPkMCreate(){
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.pkm.create', compact('Penggunaan'));
    }
    public function PPkMEdit($id){
        $Pengajuan = Pengajuan::findOrFail($id);
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.pkm.edit', compact('Pengajuan', 'Penggunaan')); //namaVariabel
    }

    //===================================================================================================================================
    //5. Biaya SDM
    public function PSDMCreate(){
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.sdm.create', compact('Penggunaan'));
    }
    public function PSDMEdit($id){
        $Pengajuan = Pengajuan::findOrFail($id);
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.sdm.edit', compact('Pengajuan', 'Penggunaan')); //namaVariabel
    }

    //===================================================================================================================================
    //6. Biaya Sarana
    public function PSaranaCreate(){
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.sarana.create', compact('Penggunaan'));
    }
    public function PSaranaEdit($id){
        $Pengajuan = Pengajuan::findOrFail($id);
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.sarana.edit', compact('Pengajuan', 'Penggunaan')); //namaVariabel
    }
    //===================================================================================================================================
    //7. Biaya Prasarana
    public function PPrasaranaCreate(){
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.prasarana.create', compact('Penggunaan'));
    }
    public function PPrasaranaEdit($id){
        $Pengajuan = Pengajuan::findOrFail($id);
        $Penggunaan = Penggunaan::all();
        return view('workplan.pengajuan.prasarana.edit', compact('Pengajuan', 'Penggunaan')); //namaVariabel
    }
    
}
