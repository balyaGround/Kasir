<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function penjualanDetail(){
        return $this->hasMany(PenjualanDetail::class,'penjualans_id');
    }
}
