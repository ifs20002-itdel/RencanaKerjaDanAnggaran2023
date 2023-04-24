<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Unit extends Model
{
    protected $fillable = ['unit_id', 'name', 'inisial', 'kepala_id', 'kepala', 'pegawai_id', 'nama'];

    public static function all()
    {
        $token = session('token');
        $responseDataUnit = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/unit')->body();
        $data = $response->json()['data']['unit'];
        return collect($data)->map(function ($unit) {
            return new self($unit);
        });
    }
}
