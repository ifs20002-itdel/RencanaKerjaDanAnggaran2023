<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workgroup extends Model
{
    use HasFactory;
    protected $table = "workgroup";
    protected $fillable = ["id", "nama", "unit", "controller"];

    public function setCategoryAttribute($value)
    {
        $this->attributes['unit'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['unit'] = json_decode($value);
    }

}
