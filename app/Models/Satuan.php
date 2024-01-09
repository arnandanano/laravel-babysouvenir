<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Satuan extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'nama_satuan',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_satuan'
            ]
        ];
    }

    public function relationToStok(): HasMany
    {
        return $this->hasMany(Stok::class, 'satuan_id');
    }
}
