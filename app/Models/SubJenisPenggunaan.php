<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubJenisPenggunaan extends Model
{
    use HasFactory;
    protected $table = "subjenispenggunaan";
    protected $fillable = ["namaSubJenisPenggunaan", "jenispenggunaan_id"];
    
    public function jenispenggunaan(){
        return $this->belongsTo('App\Models\Jenispenggunaan', 'jenispenggunaan_id');
    }
}
