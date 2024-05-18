<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sarapan extends Model
{
    use HasFactory;
    protected $fillable=['name','stock','price','description'];
    public function detiltransaksi():BelongsTo
    {
        return $this->belongsTo(Detiltransaksi::class);
    }


}
