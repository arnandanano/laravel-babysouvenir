<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $table = 'site_settings';
    protected $fillable = [
        'nama_mitra',
        'kontak_admin',
        'email',
        'instagram_link',
        'tiktok_link',
        'alamat_mitra',
        'tentang',
        'berkas'
    ];
}
