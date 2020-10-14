<?php

namespace App\Models;

use App\Models\Master\Bahan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  ProdukJual extends Model
{
    protected $fillable=['produk_id','bahan_id','bahan_qty'];
    use HasFactory;

    public function bahan(){
        return $this->belongsTo(Bahan::class);
    }
}
