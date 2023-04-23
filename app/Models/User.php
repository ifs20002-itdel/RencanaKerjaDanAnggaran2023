<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticatableTrait;

    // protected $fillable = ["id", "pegawai_id", "nama", "nip", "alias", "email", "username", "status", "remember_token"];
    protected $fillable = ['user_id', 'username'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (! empty($attributes)) {
            $this->fill($attributes);
        }
    }

    public function pengajuan()
    {
        return $this->belongsTo('App\Models\Pengajuan');
    }
    public function penggunaan()
    {
        return $this->belongsTo('App\Models\Penggunaan');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
