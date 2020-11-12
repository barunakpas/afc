<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'sort_desc', 'promo_price', 'price', 'whatsapp_message', 'is_sort', 'active', 'highlight'];

    public function scopeActive($query)
    {
    	return $query->where('active', true);
    }
}
