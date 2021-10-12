<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';

    protected $fillable = [
        'jenis_gratifikasi',
        'nilai_equivalent',
        'tanggal_pemberian',
        'tempat',
        'hubungan_pemberi',
        'pemberi_gratifikasi_id',
    ];


    public function tugas()
    {
        return $this->belongsTo(Outbox::class);
    }

    public function pemberi()
    {
        return $this->belongsTo(Pemberi::class, 'pemberi_gratifikasi_id');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
    
}
