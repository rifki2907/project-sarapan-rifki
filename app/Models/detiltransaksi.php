<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Detiltransaksi extends Model
{
    use HasFactory;
    protected $fillable=['transaksi_id','sarapan_id','qty','price'];
    public function transaksi():BelongsTo
    {
        return $this->belongsTo(Transaksi::class);
    }

    
}