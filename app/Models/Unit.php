<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = "unit";
    protected $primaryKey = 'unit_id';
    protected $fillable = ["unit_id", "name", "inisial", "kepala_id", "kepala", "pegawai_id", "nama"];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'kepala_id');
    }
    public function program()
    {
        return $this->hasMany(Program::class, 'unit_id');
    }

}
