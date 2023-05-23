<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\JenisPenggunaanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\JPenggunaanController;
use App\Http\Controllers\WorkgroupController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('guest')->group(function(){
    Route::post('/login/auth', [LoginController::class, 'login']);

    Route::get('/user/login', function() {
        return view('login');
    })->name('login');

});

//Route::middleware('auth')->group(function() {
    Route::get('/', function(){
        return view('welcomming');
      
    });
    
    //Profile
    Route::get('/profile', [LoginController::class, 'profile']);
    Route::get('/user/logout', [LoginController::class, 'logout']);

    //ListJenisPenggunaan
    Route::get('/listJenisAnggaran', [JenisPenggunaanController::class, 'listJenisPenggunaan']);    

    //WORKGROUP
    Route::get('/workgroup', [WorkgroupController::class, 'wgindex']);
    Route::get('/workgroup/create', [WorkgroupController::class, 'wgcreate']);
    Route::post('/workgroup/store', [WorkgroupController::class, 'wgstore']);

    
    //JENIS PENGGUNAAN (NEW)
        //CREATE
        Route::get('/jp', [JPenggunaanController::class, 'JPenggunaan']);
        Route::get('/jpcreate', [JPenggunaanController::class, 'jpCreate']);
        Route::post('/jp', [JPenggunaanController::class, 'jpStore']);
        Route::get('/jp', [JPenggunaanController::class, 'JPenggunaanIndex']);
        Route::get('/jp/{jenispenggunaan_id}/edit', [JPenggunaanController::class, 'JPEdit']);
        Route::put('/jp/{jenispenggunaan_id}', [JPenggunaanController::class, 'JPUpdate']);
        Route::delete('/jp/{jenispenggunaan_id}', [JPenggunaanController::class, 'JPDestroy']);


    //JenisPenggunaan
    Route::get('/addJenisPenggunaan', [JenisPenggunaanController::class, 'addJenisPenggunaan']);

    //1. Biaya Pendidikan
      //A. Biaya Dosen
      Route::get('/jpDosen/create', [JenisPenggunaanController::class, 'biayaDosenCreate']);
      Route::post('/addJenisPenggunaan', [JenisPenggunaanController::class, 'biayaDosenStore']);
      Route::get('/addJenisPenggunaan', [JenisPenggunaanController::class, 'biayaDosenIndex']);
      Route::get('/addJenisPenggunaan/{jenis_penggunaan_id}', [JenisPenggunaanController::class, 'biayaDosenShow']);
      Route::get('/jpDosen/{jenis_penggunaan_id}/edit', [JenisPenggunaanController::class, 'biayaDosenEdit']);
      Route::put('/addJenisPenggunaan/{jenis_penggunaan_id}', [JenisPenggunaanController::class, 'biayaDosenUpdate']);
      Route::delete('/addJenisPenggunaan/{jenis_penggunaan_id}', [JenisPenggunaanController::class, 'biayaDosenDestroy']);
    
      //B. Gaji Tenaga Kependidikan
      Route::get('/jpTenagaKependidikan/create', [JenisPenggunaanController::class, 'biayaTKCreate']);
      Route::get('/jpTenagaKependidikan/{jenis_penggunaan_id}/edit', [JenisPenggunaanController::class, 'biayaTKEdit']);

      //C. Biaya Operasional Pembelajaran
      Route::get('/jpPembelajaran/create', [JenisPenggunaanController::class, 'biayaOPCreate']);
      Route::get('/jpPembelajaran/{jenis_penggunaan_id}/edit', [JenisPenggunaanController::class, 'biayaOPEdit']);

      //D. Biaya Operasional Tidak Langsung
      Route::get('/jpBOTL/create', [JenisPenggunaanController::class, 'biayaOPTLCreate']);
      Route::get('/jpBOTL/{jenis_penggunaan_id}/edit', [JenisPenggunaanController::class, 'biayaOPTLEdit']);
      
    //2. Biaya Operasional Kemahasiswaan
    Route::get('/jpKemahasiswaan/create', [JenisPenggunaanController::class, 'KemahasiswaanCreate']);
    Route::get('/jpKemahasiswaan/{jenis_penggunaan_id}/edit', [JenisPenggunaanController::class, 'KemahasiswaanEdit']);
    
    //3. Biaya Penelitian
    Route::get('/jpPenelitian/create', [JenisPenggunaanController::class, 'PenelitianCreate']);
    Route::get('/jpPenelitian/{jenis_penggunaan_id}/edit', [JenisPenggunaanController::class, 'PenelitianEdit']);
      
    //4. Biaya PkM
    Route::get('/jpPkM/create', [JenisPenggunaanController::class, 'PkMCreate']);
    Route::get('/jpPkM/{jenis_penggunaan_id}/edit', [JenisPenggunaanController::class, 'PkMEdit']);
       
    //5. Biaya SDM
    Route::get('/jpSDM/create', [JenisPenggunaanController::class, 'SDMCreate']);
    Route::get('/jpSDM/{jenis_penggunaan_id}/edit', [JenisPenggunaanController::class, 'SDMEdit']);
    
    //6. Biaya Sarana
    Route::get('/jpSarana/create', [JenisPenggunaanController::class, 'SaranaCreate']);
    Route::get('/jpSarana/{jenis_penggunaan_id}/edit', [JenisPenggunaanController::class, 'SaranaEdit']);
    
     //6. Biaya Prasarana
     Route::get('/jpPrasarana/create', [JenisPenggunaanController::class, 'PrasaranaCreate']);
     Route::get('/jpPrasarana/{jenis_penggunaan_id}/edit', [JenisPenggunaanController::class, 'PrasaranaEdit']);
  

//Pengajuan
//=====================================================================================================================================================
     //Ajukan Rencana Kerja Dan Anggaran
     //JenisPenggunaan
    Route::get('/pengajuan', [PengajuanController::class, 'Pengajuan']);
    Route::post('/pengajuan', [PengajuanController::class, 'PengajuanStore']);
    Route::get('/pengajuan/{pengajuan_id}', [PengajuanController::class, 'PengajuanShow']);
    Route::get('/pengajuan/{pengajuan_id}', [PengajuanController::class, 'PengajuanShowOld']);
    Route::put('/pengajuan/{pengajuan_id}', [PengajuanController::class, 'PengajuanUpdate']);
    Route::delete('/pengajuan/{pengajuan_id}', [PengajuanController::class, 'PengajuanDestroy']);

    Route::delete('/RKA/{pengajuan_id}', [PengajuanController::class, 'RKADestroy']);
     //1. Biaya Dosen
        //A. Create and Edit
        Route::get('/PDosen/create', [PengajuanController::class, 'PDosenCreate']);
        Route::get('/PDosen/{pengajuan_id}/edit', [PengajuanController::class, 'PDosenEdit']);
        
         //B. Create and Edit
         Route::get('/PGTK/create', [PengajuanController::class, 'PGTKCreate']);
         Route::get('/PGTK/{pengajuan_id}/edit', [PengajuanController::class, 'PGTKEdit']);
         
         //C. Create and Edit
         Route::get('/PPembelajaran/create', [PengajuanController::class, 'PPembelajaranCreate']);
         Route::get('/PPembelajaran/{pengajuan_id}/edit', [PengajuanController::class, 'PPembelajaranEdit']);
         
         //D. Create and Edit
         Route::get('/PBOTL/create', [PengajuanController::class, 'PBOTLCreate']);
         Route::get('/PBOTL/{pengajuan_id}/edit', [PengajuanController::class, 'PBOTLEdit']);
    
    //2. Kemahasiswaan
    Route::get('/PKemahasiswaan/create', [PengajuanController::class, 'PKemahasiswaanCreate']);
    Route::get('/PKemahasiswaan/{pengajuan_id}/edit', [PengajuanController::class, 'PKemahasiswaanEdit']);

    //3. Penelitian
    Route::get('/PPenelitian/create', [PengajuanController::class, 'PPenelitianCreate']);
    Route::get('/PPenelitian/{pengajuan_id}/edit', [PengajuanController::class, 'PPenelitianEdit']);

    //4. PkM
    Route::get('/PPkM/create', [PengajuanController::class, 'PPkMCreate']);
    Route::get('/PPkM/{pengajuan_id}/edit', [PengajuanController::class, 'PPkMEdit']);

    //5. SDM
    Route::get('/PSDM/create', [PengajuanController::class, 'PSDMCreate']);
    Route::get('/PSDM/{pengajuan_id}/edit', [PengajuanController::class, 'PSDMEdit']);

    //6. Sarana 
    Route::get('/PSarana/create', [PengajuanController::class, 'PSaranaCreate']);
    Route::get('/PSarana/{pengajuan_id}/edit', [PengajuanController::class, 'PSaranaEdit']);

    //7. Prasarana 
    Route::get('/PPrasarana/create', [PengajuanController::class, 'PPrasaranaCreate']);
    Route::get('/PPrasarana/{pengajuan_id}/edit', [PengajuanController::class, 'PPrasaranaEdit']);


    //List RKA
    Route::get('/RKA', [PengajuanController::class, 'RKA']);

    //Approve
    Route::get('/approved/{id}', [PengajuanController::class, 'approved']);

    //Canceled
    Route::get('/canceled/{id}', [PengajuanController::class, 'canceled']);

 //});
