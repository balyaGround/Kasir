<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $fillable=['nama','quantity','harga','image_uri'];
    use HasFactory;
}
