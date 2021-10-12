<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    use HasFactory;
    protected $table = 'surat_tugas';

    protected $fillable = [
        'nama_surat',
        'file_surat',
        'surat_masuk_id',
    ];

    public function inbox()
    {
        return $this->belongsTo(Inbox::class,'surat_masuk_id');
    }

    public function petugas()
    {
        return $this->hasMany(Petugas::class, 'surat_tugas_id', 'id');
    }

    public function laporan()
    {
        return $this->hasManyThrough(Laporan::class, Petugas::class, 'surat_tugas_id', 'petugas_id', 'id', 'id');
    }
    
}
