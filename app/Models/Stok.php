<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stok extends Model
{
    use HasFactory, Sluggable, Notifiable;

    protected $table = 'stoks';
    protected $fillable = [
        'nama_stok',
        'jumlah',
        'satuan_id',
        'slug',
        'min_stok'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_stok'
            ]
        ];
    }

    public function relationToSatuan(): BelongsTo
    {
        return $this->belongsTo(Satuan::class);
    }

    public function satuan(): BelongsTo
    {
        return $this->belongsTo(Satuan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
