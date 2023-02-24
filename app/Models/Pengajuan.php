<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = "pengajuan";
    protected $fillable = ["jenis", "rincianProgram", "volume", "satuan", "hargaSatuan", "total", "start", "finish", "pemohon", "status", "user_id", "penggunaan_id"];

    public function penggunaan()
    {
        return $this->belongsTo('App\Models\Penggunaan');
    }
    public function users()
    {
        return $this->hasMany('App\Models\Users');
    }

}
