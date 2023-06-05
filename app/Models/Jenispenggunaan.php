<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenispenggunaan extends Model
{
    use HasFactory;
    protected $table = "jenispenggunaan";
    protected $fillable = ["nama"];

    public function subjenispenggunaan()
    {
        return $this->hasMany('App\Models\SubJenisPenggunaan');
    }
    public function mataanggaran()
    {
        return $this->hasMany('App\Models\MataAnggaran');
    }

}
