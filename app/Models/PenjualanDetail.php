<?php

namespace App\Models;

use App\Models\Master\Bahan;
use App\Models\Master\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function produk(){
        return $this->belongsTo(Produk::class);
    }

}
