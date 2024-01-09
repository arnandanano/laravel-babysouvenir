<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';
    protected $fillable = [
        'name',
    ];

    public function relationToNota()
    {
        return $this->hasOne(Nota::class,'pembayaran_id','id');
    }
}
