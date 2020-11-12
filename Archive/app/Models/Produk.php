<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'banner', 'title', 'image', 'video', 'description', 'promo_price', 'price', 'whatsapp_message', 'view', 'active', 'slug'];

    public function posts(){
        return $this->hasMany('App\Models\Testimony');
    }

    public function scopeActive($query)
    {
    	return $query->where('active', true);
    }

    public function scopeSlug($query, $slug)
    {
    	return $query->where('slug', $slug);
    }
}
