<?php

namespace App\Models\Logs;

use App\Models\Master\Bahan;
use App\Models\Master\Toko;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokLog extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function bahan(){
        return $this->belongsTo(Bahan::class);
    }

    public function toko(){
        return $this->belongsTo(Toko::class);
    }
    public function user(){
        return $this->belongsto(User::class);
    }
}
