<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'banner', 'banner_small', 'banner_1', 'banner_2', 'banner_3', 'title', 'title_1', 'title_2', 'title_3', 'image', 'video', 'description', 'description_1', 'description_2', 'promo_price', 'price', 'whatsapp_message', 'view', 'active', 'slug'];

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
