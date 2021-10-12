<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemberi extends Model
{
    use HasFactory;
    protected $table = 'pemberi_gratifikasi';

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'pemberi_gratifikasi_id', 'id');
    }
}
