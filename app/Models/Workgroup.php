<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workgroup extends Model
{
    use HasFactory;
    protected $table = "workgroup";
    protected $fillable = ["id", "nama", "unit_id"];

}
