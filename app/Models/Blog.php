<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'sort_desc', 'desc', 'view', 'active', 'slug'];

    public function scopeActive($query)
    {
    	return $query->where('active', true);
    }

    public function scopeSlug($query, $slug)
    {
    	return $query->where('slug', $slug);
    }
}
