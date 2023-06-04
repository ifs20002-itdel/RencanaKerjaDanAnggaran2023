<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataAnggaran extends Model
{
    use HasFactory;
    protected $table = "mataanggaran";
    protected $fillable = ["mataAnggaran", "namaAnggaran", "workgroup_id", "jenispenggunaan_id", "subjenispenggunaan_id"];
    
    public function jenispenggunaan(){
        return $this->belongsTo('App\Models\Jenispenggunaan', 'jenispenggunaan_id');
    }
}
