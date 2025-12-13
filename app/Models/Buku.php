<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    protected $guarded = [];
    public function penerbit()
{
    return $this->belongsTo(Penerbit::class);
}

public function kategori()
{
    return $this->belongsTo(Kategori::class);
}

}
