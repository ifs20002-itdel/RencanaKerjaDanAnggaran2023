<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    use HasFactory;
    protected $table = "pejabat";
    protected $primaryKey = 'jabatan_id';
    protected $fillable = ["pegawai_id", "nama", "jabatan_id", "jabatan"];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
    public function unit()
    {
        return $this->hasMany(Unit::class, 'kepala_id');
    }
    public function workgroup()
    {
        return $this->hasMany(Workgroup::class, 'controller');
    }
    public function mataanggaran()
    {
        return $this->hasMany(MataAnggaran::class, 'controller');
    }
    public function program()
    {
        return $this->hasMany(Program::class, 'jabatan_id');
    }
    public function riwayatprogram()
    {
        return $this->hasMany(RiwayatProgram::class, 'controller');
    }

    
}
