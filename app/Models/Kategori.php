<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'kategoris';
    protected $fillable = [
        'nama_kategori',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_kategori'
            ]
        ];
    }

    public function relationToProduk()
    {
        return $this->hasMany(Produk::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
