<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukPaten extends Model
{
    use HasFactory;

    protected $fillable = ['produk_id', 'image', 'title', 'description', 'active'];

    public function scopeActive($query)
    {
    	return $query->where('active', true);
    }
}
