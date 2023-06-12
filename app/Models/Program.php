<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = "program";
    protected $primaryKey = 'program_id';
    protected $fillable = [
        "program_id",  
        "namaProgram", 
        "tujuan", 
        "deskripsi", 
        "waktu", 	
        "volume", 
        "hargaSatuan", 
        "hargaTotal",
        "tahun_id", 
        "satuan_id",
        "mataanggaran_id", 
        "user_id", 
        "unit_id", 
        "jabatan_id",
        "status"
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function pejabat()
    {
        return $this->belongsTo('App\Models\Pejabat', 'jabatan_id');
    }
    public function satuan()
    {
        return $this->belongsTo('App\Models\Satuan', 'satuan_id');
    }
    public function mataanggaran()
    {
        return $this->belongsTo('App\Models\MataAnggaran', 'mataanggaran_id');
    }
    public function tahun()
    {
        return $this->belongsTo('App\Models\Tahun', 'tahun_id');
    }
    public function unit()
    {
        return $this->belongsTo('App\Models\Unit', 'unit_id');
    }

    public function riwayatprogram()
    {
        return $this->hasMany(RiwayatProgram::class, 'program_id');
    }

}
