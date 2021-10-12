<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';
    protected $fillable = [
        'nama_surat',
        'file_surat',
    ];
}
