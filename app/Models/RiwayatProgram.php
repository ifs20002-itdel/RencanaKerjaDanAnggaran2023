<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatProgram extends Model
{
    use HasFactory;
    protected $table = "riwayatprogram";
    protected $primaryKey = 'riwayatprogram_id';
    protected $fillable = [
        "riwayatprogram_id",  
        "kritik", 
        "program_id", 
        "controller", 
        "user_id"
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function pejabat()
    {
        return $this->belongsTo('App\Models\Pejabat', 'controller');
    }
    public function program()
    {
        return $this->belongsTo('App\Models\Program', 'program_id');
    }
}
