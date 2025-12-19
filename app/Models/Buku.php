<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    protected $guarded = [];
    protected $fillable = [
    'judul_buku', 'pengarang', 'tahun_terbit', 'stok', 'penerbit_id', 'kategori_id'
];
    public function penerbit()
{
    return $this->belongsTo(Penerbit::class);
}

public function kategori()
{
    return $this->belongsTo(Kategori::class);
}

}
