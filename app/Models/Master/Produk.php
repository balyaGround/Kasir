<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable=['nama','harga_jual','harga_modal','image_uri','toko_id'];
    use HasFactory;

    public function toko(){
        return $this->belongsTo(Toko::class);
    }
}
