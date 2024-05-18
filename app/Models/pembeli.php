<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasMany;

class Pembeli extends Model
{
    use HasFactory;
    protected $fillable=['name','hp','alamat'];
    
    public function transaksi():HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
