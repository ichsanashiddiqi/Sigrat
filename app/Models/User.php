<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'nip',
        'email',
        'password',
        'role',
        'jabatan',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getProfilepictureFilenameAttribute()
    {
        if (! $this->attributes['avatar']) {
            return '/images/incognito.png';
        }

        return $this->attributes['avatar'];
    }

    public function scopePegawaiNganggur($query)
    {
        return $query->whereIn('id', function ($q) {
            $q->select('users.id')
                ->from('users')
                ->leftJoin('petugas', 'petugas.user_id', '=', 'users.id')
                ->join('laporan', 'petugas.id', '=', 'laporan.petugas_id', 'left outer')
                ->whereNull('petugas.surat_tugas_id')
                ->orWhere(function ($q) {
                    $q->whereNotNull('petugas.id')
                        ->whereNotNull('laporan.petugas_id');
                });
        });
    }
}
