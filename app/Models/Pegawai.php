<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $primaryKey = 'pegawai_id';
    protected $fillable = ["pegawai_id", "nip", "nama", "email", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pejabat()
    {
        return $this->hasMany(Pejabat::class, 'pegawai_id');
    }

    public function unit()
    {
        return $this->hasMany(Unit::class, 'pegawai_id');
    }
    
}
