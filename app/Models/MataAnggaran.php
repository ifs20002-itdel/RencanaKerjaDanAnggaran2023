<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataAnggaran extends Model
{ 
    use HasFactory;
    protected $table = "mataanggaran";
    protected $fillable = ["mataAnggaran", "namaAnggaran", "unit", "workgroup_id", "jenispenggunaan_id", "subjenispenggunaan_id"];
    
    public function jenispenggunaan(){
        return $this->belongsTo('App\Models\Jenispenggunaan', 'jenispenggunaan_id');
    }
    public function subjenispenggunaan(){
        return $this->belongsTo('App\Models\SubJenisPenggunaan', 'subjenispenggunaan_id');
    }
}
