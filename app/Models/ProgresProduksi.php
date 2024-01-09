<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresProduksi extends Model
{
    use HasFactory;

    protected $table = 'progres_produksis';
    protected $fillable = [
        'no_nota',
        'nama_pemesan',
        'produk_id',
        'qty',
        'tgl_acara',
        'proses_id',
    ];

    public function relationToProses()
    {
        return $this->belongsTo(Proses::class, 'proses_id', 'id');
    }

    public function relationToProduk()
    {
        return $this->hasOne(Produk::class,'id','produk_id');
    }

    public function relationToNota()
    {
        return $this->belongsTo(Nota::class, 'no_nota');
    }
}
