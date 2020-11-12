<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukResolve extends Model
{
    use HasFactory;

    protected $fillable = ['produk_id', 'no', 'title', 'active'];

    public function scopeActive($query)
    {
    	return $query->where('active', true);
    }
}
