<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;
    protected $table = "tahun";
    protected $primaryKey = 'tahun_id';
    protected $fillable = ["tahun_id", "tahun", "deskripsi"];

    public function program()
    {
        return $this->hasMany('App\Models\Tahun');
    }
}
