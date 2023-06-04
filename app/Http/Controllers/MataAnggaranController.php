<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jenispenggunaan;
use App\Models\SubJenisPenggunaan;

class MataAnggaranController extends Controller
{
    public function create(){
        return view('workplan.mataanggaran.create');
    }
}
