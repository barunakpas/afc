<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'video', 'active', 'product_id'];

    public function produk()
	{
		return $this->belongsTo( 'App\Models\Produk', 'product_id' );
	}

	public function scopeActive($query)
    {
    	return $query->where('active', true);
    }
}
