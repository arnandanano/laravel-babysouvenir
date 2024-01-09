<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory, HasFormatRupiah;

    protected $table = 'produks';
    protected $fillable = [
        'nama_produk',
        'harga',
        'ukuran',
        'kategori_id',
        'gambar',
    ];

    public function relationToKategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function relationToNota()
    {
        return $this->belongsTo(Nota::class,'id','produk_id');
    }

    public function relationToProgresProduksi()
    {
        return $this->hasMany(ProgresProduksi::class);
    }
}
