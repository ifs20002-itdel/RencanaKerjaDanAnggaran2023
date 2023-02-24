<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    use HasFactory;
    protected $table = "penggunaan";
    protected $fillable = ["bagianTable", "mataAnggaran", "namaAnggaran"];

    public function pengajuan()
    {
        return $this->hasMany('App\Models\Pengajuan');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\Users');
    }
}
