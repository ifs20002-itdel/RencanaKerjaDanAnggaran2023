<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Unit extends Model
{
    use HasFactory;
    protected $table = "unit";
    protected $fillable = ["unit_id", "name", "inisial", "kepala_id", "kepala", "pegawai_id", "nama"];

}
