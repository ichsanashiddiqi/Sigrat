<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function suratTugas()
    {
        return $this->belongsTo(Outbox::class,'surat_tugas_id');
    }

    public function laporan()
    {
        return $this->hasOne(Laporan::class, 'petugas_id', 'id');
    }
    public function scopeLaporanTrue($query)
    {
        return $query->whereIn('id', function ($q) {
            $q->select('*.petugas','*.laporan','*.users','*.pemberi')
                ->from('laporan','users','pemberi')
                ->join('users', 'petugas.user_id', '=', 'users.id','inner')
                ->join('laporan', 'petugas.id', '=', 'laporan.petugas_id', 'inner')
                ->join('pemberi_gratifikasi', 'laporan.pemberi_gratifikasi_id', '=', 'pemberi_gratifikasi.id', 'inner')
                ->whereNotNull('laporan.petugas_id');
        });
    }
}
