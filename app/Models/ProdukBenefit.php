<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukBenefit extends Model
{
    use HasFactory;

    protected $fillable = ['no', 'produk_id', 'image', 'title', 'active'];

    public function scopeActive($query)
    {
    	return $query->where('active', true);
    }
}
