<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nota extends Model
{
    use HasFactory, HasFormatRupiah;

    protected $table = 'notas';
    protected $fillable = [
        'no_nota',
        'nama_pemesan',
        'produk_id',
        'harga',
        'qty',
        'tgl_acara',
        'pembayaran_id',
        'catatan',
    ];

    public function relationToProduk()
    {
        return $this->hasOne(Produk::class,'id','produk_id');
    }

    public function relationToPembayaran()
    {
        return $this->belongsTo(Pembayaran::class,'pembayaran_id','id');
    }

    public function relationToProgresProduksi()
    {
        return $this->hasOne(ProgresProduksi::class, 'proses_id');
    }

    public function tracking()
    {
        return $this->hasMany(ProgresProduksi::class);
    }
}
