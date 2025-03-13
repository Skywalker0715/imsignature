<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_surat',
        'kepada',
        'perihal',
        'users_id',
        'file_surat',
        'status',
        'generate_hasil',
        'isi_surat',
        'tanggal_kirim',
    ];

    
}
