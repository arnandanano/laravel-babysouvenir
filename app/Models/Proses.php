<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    use HasFactory;

    protected $table = 'proses';
    protected $fillable = [
        'nama_proses',
    ];

    public function relationToProgresProduksi()
    {
        return $this->hasOne(ProgresProduksi::class, 'proses_id', 'id');
    }
}
