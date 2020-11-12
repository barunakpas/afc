<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'type', 'img_loc', 'active', 'is_sort', 'bg_color', 'after_product'];

    public function scopeActive($query)
    {
    	return $query->where('active', true);
    }
}
